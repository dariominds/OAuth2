<?php

return [
    'redirectUri' => 'https://auth2demo.yourdomain.com/auth/cb/${provider}/',
    'provider' => [
        'google' => [
            'applicationId' => '12345678900000000000.apps.googleusercontent.com',
            'applicationSecret' => 'xyxyxyxyxyxyxyxy',
            'scope' => [
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile'
            ],
            'options' => [
                'auth.parameters' => [
                    'hd' => 'yourdomain.com',
                ]
            ]
        ],
     ]
];

