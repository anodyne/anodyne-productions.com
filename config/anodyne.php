<?php

return [
    'sponsors' => [
        [
            'name' => 'Sim Central',
            'image' => '/images/sponsors/logo_sim_central.svg',
            'link' => 'https://blackhawk.anurasims.com/',
            'hoverColor' => 'dark',
            'level' => 'Platinum sponsor',
        ],
        [
            'name' => 'USS Black Hawk',
            'image' => '/images/sponsors/blackhawklogo.png',
            'link' => 'https://blackhawk.anurasims.com/',
            'hoverColor' => 'light',
            'level' => 'Gold sponsor',
        ],
        [
            'name' => 'Fifth Fleet',
            'image' => '/images/sponsors/fifth_fleet.png',
            'link' => 'https://portal.5thfleet.net/',
            'hoverColor' => 'dark',
            'level' => 'Gold sponsor',
        ],
    ],

    'registration' => [
        'exceptions' => explode(',', env('ANODYNE_REGISTRATION_EXCEPTIONS')),
    ],

    'docs-versions' => explode(',', env('ANODYNE_DOCS_VERSIONS')),

    'download-url' => env('ANODYNE_DOWNLOAD_URL'),
];
