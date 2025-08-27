<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;
use App\Notifications\DailyRevenueReportNotification;

class DailyRevenueReport extends Command
{
    protected $signature = 'report:revenue
                            {--date= : YYYY-MM-DD, mặc định hôm qua (theo APP_TIMEZONE)}
                            {--statuses= : CSV trạng thái được tính doanh thu, vd: paid,completed}
                            {--dry : Chỉ in ra console, KHÔNG lưu file/KHÔNG gửi mail}
                            {--force : Ghi đè nếu file báo cáo đã tồn tại}';

    protected $description = 'Tính doanh thu theo ngày, lưu file (và/hoặc) gửi email cho admin';

    public function handle(): int
    {
        // 1) Xác định ngày cần báo cáo
        $appTz = config('app.timezone', 'Asia/Ho_Chi_Minh');
        $date = $this->option('date')
            ? Carbon::parse($this->option('date'), $appTz)
            : now($appTz)->subDay(); // mặc định hôm qua

        // Đổi về UTC để query theo created_at (UTC)
        $from = $date->copy()->startOfDay()->timezone('UTC');
        $to   = $date->copy()->endOfDay()->timezone('UTC');

        // 2) Trạng thái đơn được tính doanh thu
        $statusesOpt = $this->option('statuses');
        $statuses = $statusesOpt
            ? array_filter(array_map('trim', explode(',', $statusesOpt)))
            : (array) config('report.paid_statuses', ['paid', 'completed']);

        // 3) Tính toán
        $query = Order::query()->whereBetween('created_at', [$from, $to]);
        if (!empty($statuses)) {
            $query->whereIn('status', $statuses);
        }

        $orders  = $query->get(['id','total_amount','status','created_at']);
        $count   = $orders->count();
        $revenue = (float) $orders->sum('total_amount');

        // 4) Nội dung báo cáo
        $reportTz = config('report.timezone', $appTz);
        $day = $date->copy()->timezone($reportTz)->toDateString(); // ví dụ 2025-08-20

        $reportText =
            "BÁO CÁO DOANH THU\n".
            "Ngày: {$day}\n".
            "Số đơn: {$count}\n".
            "Doanh thu: ".number_format($revenue, 0, ',', '.')." đ\n";

        // In ra console
        $this->info("Ngày: {$date->toDateString()}");
        $this->line("Số đơn: {$count}");
        $this->line("Doanh thu: ".number_format($revenue, 0, ',', '.').' đ');

        // Nếu chỉ dry-run thì dừng
        if ($this->option('dry')) {
            return self::SUCCESS;
        }

        $delivery = config('report.delivery', 'file'); // file|mail|both

        // 5. Lưu file (local – KHÔNG public)
        if (in_array($delivery, ['file', 'both'], true)) {
            $disk = Storage::disk('local'); // storage/app
            $dir  = 'private/reports/daily/'.$date->format('Y/m'); // storage/app/private/reports/daily/2025/08
            $disk->makeDirectory($dir);

            $filename = "revenue-{$day}.txt";
            $fullPath = $dir.'/'.$filename;

            // Nếu đã có file và KHÔNG có --force -> bỏ qua
        if ($disk->exists($fullPath) && ! $this->option('force')) {
            $this->info("Bỏ qua: đã có sẵn storage/app/{$fullPath} (dùng --force để ghi đè).");
        } else {
            $disk->put($fullPath, $reportText);
            $this->info("Đã lưu: storage/app/{$fullPath}");
        }
        
            // dọn file cũ > n ngày
            $removed = $this->purgeOldReports(90);
            $this->info("Đã dọn {$removed} báo cáo cũ (>90 ngày).");
        }

        // 6) Gửi mail cho admin (nếu cấu hình)
        if (in_array($delivery, ['mail', 'both'], true)) {
            $admins = User::where('role', 'admin')->get(['id','name','email']);
            if ($admins->isEmpty()) {
                $this->warn('⚠️ Không tìm thấy admin để gửi báo cáo.');
                return self::SUCCESS;
            }

            Notification::send(
                $admins,
                new DailyRevenueReportNotification($day, $count, (float)$revenue)
            );

            $this->info("✔ Đã gửi báo cáo ngày {$day} tới {$admins->count()} admin.");
        }

        return self::SUCCESS;
    }

    /**
     * Dọn các báo cáo cũ hơn $days ngày trong storage/app/private/reports/daily
     */
    private function purgeOldReports(int $days = 90): int
    {
        $disk   = Storage::disk('local'); // storage/app
        $base   = 'private/reports/daily';

        if (! $disk->exists($base)) {
            return 0;
        }

        $deleted = 0;
        $cutoff  = now()->subDays($days);

        foreach ($disk->allFiles($base) as $path) {
            $ts = $disk->lastModified($path);
            if ($ts && Carbon::createFromTimestamp($ts)->lt($cutoff)) {
                $disk->delete($path);
                $deleted++;
            }
        }
        return $deleted;
    }
}
