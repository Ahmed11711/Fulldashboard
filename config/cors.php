<?php

return [

    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    // اسمح لأي Origin
    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['*'],

    'max_age' => 0,

    // ❌ لازم تكون false مع *
    'supports_credentials' => false,
];
