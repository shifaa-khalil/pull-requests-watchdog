<?php

return [

    'application_name' => env('GOOGLE_APPLICATION_NAME', ''),

    'client_id' => env('GOOGLE_CLIENT_ID', '494134613118-2gth2rin9673k4aof8k4ak9cio11fpk1.apps.googleusercontent.com'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET', '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'),
    'redirect_uri' => env('GOOGLE_REDIRECT', 'http://localhost:8000/api/google-sheets/callback'),
    'scopes' => [\Google\Service\Sheets::DRIVE, \Google\Service\Sheets::SPREADSHEETS],
    
    'post_spreadsheet_id' => env('POST_SPREADSHEET_ID'),

    'access_type' => 'online',
    'approval_prompt' => 'auto',

    'developer_key' => env('GOOGLE_DEVELOPER_KEY', ''),

    'service' => [
      
        'enable' => env('GOOGLE_SERVICE_ENABLED', true),

        'file' => env('GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION', 'C:\\Users\\Shifaa Khalil\\Downloads\\pull-requests-watchdog-387319-c476d21de6dc.json'),
    ],

    'config' => [],
];
