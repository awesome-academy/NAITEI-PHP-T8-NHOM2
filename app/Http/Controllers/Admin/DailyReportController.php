<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;

class DailyReportController extends Controller
{
    public function index(Request $request)
    {
        $disk = Storage::disk('local');
        $root = 'private/reports/daily';

        $files = collect($disk->allFiles($root))
            ->filter(fn($p) => preg_match('/revenue-\d{4}-\d{2}-\d{2}\.txt$/', basename($p)))
            ->map(function ($p) use ($disk) {
                $name = basename($p); // revenue-YYYY-MM-DD.txt
                preg_match('/(\d{4}-\d{2}-\d{2})/', $name, $m);
                $date = $m[1] ?? null;

                return [
                    'date'     => $date,
                    'path'     => $p,
                    'size'     => $disk->size($p),
                    'modified' => Carbon::createFromTimestamp($disk->lastModified($p)),
                ];
            })
            ->sortByDesc('date')
            ->values();

        return view('admin.reports.index', compact('files'));
    }

    public function download(string $date)
    {
        $ym   = str_replace('-', '/', substr($date, 0, 7)); // YYYY/MM
        $path = "private/reports/daily/{$ym}/revenue-{$date}.txt";

        $disk = Storage::disk('local');
        if (!$disk->exists($path)) abort(404);

        return new StreamedResponse(function () use ($disk, $path) {
            echo $disk->get($path);
        }, 200, [
            'Content-Type'        => 'text/plain; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=revenue-{$date}.txt",
        ]);
    }
}
