<?php
return [
    // email admin nhận báo cáo (phân tách bằng dấu phẩy trong .env)
    'admin_emails'  => array_filter(array_map('trim', explode(',', env('ADMIN_REPORT_EMAILS', 'admin@gmail.com')))),

    // cách gửi mặc định: file|mail|both
    'delivery'      => env('REPORT_DELIVERY', 'file'),

    // timezone dùng để chốt ngày báo cáo
    'timezone'      => env('APP_TIMEZONE', 'Asia/Ho_Chi_Minh'),

    // các trạng thái đơn được tính doanh thu
    'paid_statuses' => ['paid','completed'], // 'completed' để thống kê đơn hoàn thành từ COD
];
