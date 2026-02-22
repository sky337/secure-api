<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Role & Permission Settings
    |--------------------------------------------------------------------------
    |
    | Define the default roles and permissions for the application.
    |
    */
    'roles' => [
        'admin',
        'user',
    ],

    'permissions' => [
        'view_dashboard',
        'manage_users',
    ],

    /*
    |--------------------------------------------------------------------------
    | JWT Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for JWT authentication.
    |
    */
    'jwt' => [
        'ttl' => env('JWT_TTL', 60),
        'refresh_ttl' => env('JWT_REFRESH_TTL', 20160),
    ],

    /*
    |--------------------------------------------------------------------------
    | Response Format
    |--------------------------------------------------------------------------
    |
    | Standard API response keys.
    |
    */
    'responses' => [
        'status_key' => 'status',
        'message_key' => 'message',
        'data_key' => 'data',
    ],
];
