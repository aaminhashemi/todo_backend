<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | Configure the options for CORS (Cross-Origin Resource Sharing) here.
    | These options control what domains and methods are allowed in cross-origin
    | requests.
    |
    */

    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
         '*', /*'https://todo-frontend-tmrg.onrender.com'*/
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
