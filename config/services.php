<?php

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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => env('GH_ID'),
        'client_secret' => env('GH_SECRET'),
        'redirect' =>  'http://127.0.0.1:8000/api/oauth/github/callback',  //env('APP_URL') . '/oauth/github/callback',
    ],

    'facebook' => [
        'client_id'     => env('FB_ID'),
        'client_secret' => env('FB_SECRET'),
        'redirect'      => 'http://127.0.0.1:8000/api/oauth/facebook/callback',   //env('APP_URL') . '/oauth/facebook/callback',
    ],

    'twitter' => [
        'client_id'     => env('TW_ID'),
        'client_secret' => env('TW_SECRET'),
        'redirect'      => 'http://127.0.0.1:8000/api/oauth/twitter/callback',  // env('APP_URL') . '/oauth/twitter/callback',
    ],

    'google' => [
        'client_id'     => env('GL_ID'),
        'client_secret' => env('GL_SECRET'),
        'redirect'      => 'http://127.0.0.1:8000/api/oauth/google/callback' //env('APP_URL') . '/oauth/google/callback',
    ],
];
