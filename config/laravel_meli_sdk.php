<?php

return [
    'site_id' => env('MELI_SITE_ID', 'MLA'),
    'app_id' => env('MELI_APP_ID'),
    'app_secret' => env('MELI_APP_SECRET'),
    'redirect_url' => env('MELI_REDIRECT_URL', 'meli_auth')
];
