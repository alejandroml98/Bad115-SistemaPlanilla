<?php

return [
    'oracle' => [
        'driver'            => 'oracle',
        'host'              => env('DB_HOST', ''),
        'port'              => env('DB_PORT', '1521'),        
        'database'          => env('DB_DATABASE', ''),
        'service_name'	=> 'ORCLPDB1.localdomain',
        'username'          => env('DB_USERNAME', ''),
        'password'          => env('DB_PASSWORD', ''),
        'charset'           => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'            => env('DB_PREFIX', ''),
    ],
];
