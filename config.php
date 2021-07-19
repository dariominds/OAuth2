<?php

return [
    'redirectUri' => 'https://auth2demo.dealereprocess.com/auth/cb/${provider}/',
    'provider' => [
        'google' => [
            'applicationId' => '872235533570-h6al8us7v5kvkkv4mi4306ll97ar4v9e.apps.googleusercontent.com',
            'applicationSecret' => 'gtLjWy5V_Ibkiz7tfFx4h6eS',
            'scope' => [
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile'
            ],
            'options' => [
                'auth.parameters' => [
                    'hd' => 'dealereprocess.com',
                ]
            ]
        ],
     ]
];

