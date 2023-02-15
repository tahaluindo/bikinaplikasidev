<?php

error_reporting(0);

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'google' => [
    //     'client_id' => env('GITHUB_CLIENT_ID'),
    //     'client_secret' => env('GITHUB_CLIENT_SECRET'),
    //     'redirect' => 'http://example.com/callback-url',
    // ],

    // 'facebook' => [
    //     'client_id' => env('GITHUB_CLIENT_ID'),
    //     'client_secret' => env('GITHUB_CLIENT_SECRET'),
    //     'redirect' => 'http://example.com/callback-url',
    // ],

    'github' => [
         'client_id' => env('GITHUB_CLIENT_ID'),
         'client_secret' => env('GITHUB_CLIENT_SECRET'),
         'redirect' => $_SERVER['HTP_HOST'] . '/' . 'auth/callback/github',
     ],

     'google' => [
         'client_id' => env('GOOGLE_CLIENT_ID'),
         'client_secret' => env('GOOGLE_CLIENT_SECRET'),
         'redirect' => $_SERVER['HTP_HOST'] . '/' . 'auth/callback/google',
     ],
    
     'facebook' => [
         'client_id' => env('FACEBOOK_CLIENT_ID'),
         'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
         'redirect' => $_SERVER['HTP_HOST'] . '/' . 'auth/callback/facebook',
     ],
    
     'instagram' => [
         'client_id' => env('INSTAGRAM_CLIENT_ID'),
         'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
         'redirect' => $_SERVER['HTP_HOST'] . '/' . 'auth/callback/instagram',
     ],
    
     'instagrambasic' => [
         'client_id' => env('INSTAGRAMBASIC_CLIENT_ID'),
         'client_secret' => env('INSTAGRAMBASIC_CLIENT_SECRET'),
         'redirect' => $_SERVER['HTP_HOST'] . '/' . 'auth/callback/instagrambasic',
     ],
];
