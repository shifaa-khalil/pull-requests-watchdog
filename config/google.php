<?php

return [

    'scopes' => [\Google\Service\Sheets::DRIVE, \Google\Service\Sheets::SPREADSHEETS],
    
    'post_spreadsheet_id' => env('POST_SPREADSHEET_ID'),

    'access_type' => 'online',
    'approval_prompt' => 'auto',

    'service' => [
      
        'enable' => env('GOOGLE_SERVICE_ENABLED', true),

        'file' => env('GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION', ''),
    ],

    'config' => [],
];
