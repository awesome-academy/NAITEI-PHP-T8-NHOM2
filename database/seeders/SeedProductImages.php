<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SeedProductImages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $src = resource_path('seed_img/products');
        $disk = Storage::disk('public');
        $dstDir = 'products';

        if (! File::exists($src)) {
            $this->command->warn("⚠️ Không thấy thư mục $src");
            return;
        }

        $disk->makeDirectory($dstDir);

        $files = collect(File::files($src))
            ->filter(fn ($f) => preg_match('/\.(jpe?g|png|webp)$/i', $f->getFilename()))
            ->values();

        if ($files->isEmpty()) {
            $this->command->warn("⚠️ Không có file ảnh hợp lệ trong $src");
        }

        foreach ($files as $f) {
            $dst = $dstDir . '/' . $f->getFilename();
            if (! $disk->exists($dst)) {
                $disk->put($dst, File::get($f->getPathname()));
                $this->command->info("✔ Copied: {$f->getFilename()}");
            }
        }
    }
}
