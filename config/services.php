<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id' => '328e3cba03385824dd4a',
        'client_secret' => 'd555314077297de4b713744abc684e8ab2d3cfbd',
        'redirect' => 'http://192.168.1.57:8000/login/github',
    ],
//        'redirect' => 'https://laravpolls.gotrecillo.com/login/github',
    'twitter' => [
        'client_id' => 'iS56FYIUYXYzhViuOth6wiHC4',
        'client_secret' => '46u3c70E0O0qyMhckqQhMdpLB0yB6LCrZaR8fHOc4olky2n3uh',
        'redirect' => 'https://laravpolls.gotrecillo.com/login/twitter',
    ],

];
