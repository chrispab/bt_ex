<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // View settings        
        'view' => [
            'template_path' => __DIR__ . '/views',
        ],
        
        // Database settings
        'db' => [
            'host'   => "localhost",
            'user'   => "admin",
            'password'   => "chutn3y",
            'dbname' => "interview",
            'charset' => "utf8",
        ],

        // Monolog settings
        'logger' => [
            'name' => 'britishtriathlon-interview',
            'path' => __DIR__ . '/../logs/app.log', // needs to be writeable
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
