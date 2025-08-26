<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('report:daily')
    ->dailyAt('8:00')
    ->timezone(config('report.timezone', 'Asia/Ho_Chi_Minh'))
    ->withoutOverlapping();

if (app()->isLocal()) {
    Schedule::command('report:daily')
        ->everyFiveMinute()
        ->timezone(config('report.timezone'));
}