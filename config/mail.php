<?php

return [

    // Sử dụng SMTP làm driver mặc định cho việc gửi email
    'default' => env('MAIL_MAILER', 'smtp'),

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            // Cấu hình máy chủ SMTP và thông tin xác thực từ file .env
            'host' => env('MAIL_HOST', 'smtp.gmail.com'),  
            'port' => env('MAIL_PORT', 587),               
            'encryption' => env('MAIL_ENCRYPTION', 'tls'), 
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        // Các cấu hình khác như SES, Postmark, etc. có thể để nguyên không cần sửa
        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
    ],

    // Thiết lập địa chỉ email và tên mặc định của người gửi
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'lethithuyngan3032004@gmail.com'),
        'name' => env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel')),
    ],

];
