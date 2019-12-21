<?php

// Error reporting
error_reporting(0);
ini_set('display_errors', '0');

// timezone
date_default_timezone_set('UTC');

// Settings
$settings = [

    // Path settings
    'root' => dirname(__DIR__),
    'temp' => $settings['root'] . '/tmp',
    'public' => $settings['root'] . '/public',

    // Error Hangling Middleware settings
    'error_handler_middleware' => [

        // Should be set to false in production
        'display_error_details' => true,

        // Parameter is passed to the default ErrorHandler
        // View in rendered output by enabling the "displayErrorDetails" setting.
        // For the console and unit tests we also disable it
        'log_errors' => true,

        // Display error details in error log
        'log_error_details' => true

    ],

    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'uims_beta',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'options' => [
            // Turn off persistent connections
            PDO::ATTR_PERSISTENT => false,
            // Enable exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Emulate prepared statements
            PDO::ATTR_EMULATE_PREPARES => true,
            // Set default fetch mode to array
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Set character set
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
        ]
    ]

];

return $settings;
