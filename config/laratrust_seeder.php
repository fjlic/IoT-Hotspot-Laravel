<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'root' => [
            'root' => 'c,r,u,d',
            'admin' => 'c,r,u,d',
            'super' => 'c,r,u,d',
            'user' => 'c,r,u,d',
            'crd' => 'c,r,u,d',
            'erb' => 'c,r,u,d',
            'nfc' => 'c,r,u,d',
            'qr' => 'c,r,u,d',
            'counter' => 'c,r,u,d',
            'historialcrd' => 'c,r,u,d',
            'historialerb' => 'c,r,u,d',
            'historialnfc' => 'c,r,u,d',
            'historialqr' => 'c,r,u,d',
            'historialcounter' => 'c,r,u,d'
        ],
        'admin' => [
            'admin' => 'r,u',
            'super' => 'c,r,u,d',
            'user' => 'c,r,u,d',
            'crd' => 'c,r,u,d',
            'erb' => 'c,r,u,d',
            'nfc' => 'c,r,u,d',
            'qr' => 'c,r,u,d',
            'counter' => 'c,r,u,d',
            'historialcrd' => 'c,r,u,d',
            'historialerb' => 'c,r,u,d',
            'historialnfc' => 'c,r,u,d',
            'historialqr' => 'c,r,u,d',
            'historialcounter' => 'c,r,u,d'
        ],
        'super' => [
            'super' => 'r,u',
            'user' => 'c,r,u',
            'crd' => 'c,r,u,d',
            'erb' => 'c,r,u,d',
            'nfc' => 'c,r,u,d',
            'qr' => 'c,r,u,d',
            'counter' => 'c,r,u,d',
            'historialcrd' => 'c,r,u,d',
            'historialerb' => 'c,r,u,d',
            'historialnfc' => 'c,r,u,d',
            'historialqr' => 'c,r,u,d',
            'historialcounter' => 'c,r,u,d'
        ],
        'user' => [
            'user' => 'r,u',
            'crd' => 'c,r,u',
            'erb' => 'c,r,u',
            'nfc' => 'c,r,u',
            'qr' => 'c,r,u',
            'counter' => 'c,r,u',
            'historialcrd' => 'c,r,u',
            'historialerb' => 'c,r,u',
            'historialnfc' => 'c,r,u',
            'historialqr' => 'c,r,u',
            'historialcounter' => 'c,r,u'
        ],
        'crd' => [
            'crd' => 'c,r,u',
            'nfc' => 'c,r,u',
            'qr' => 'c,r,u',
            'counter' => 'c,r,u',
            'historialcrd' => 'c,r,u',
            'historialnfc' => 'c,r,u',
            'historialqr' => 'c,r,u',
            'historialcounter' => 'c,r,u'

        ],
        'erb' => [
            'erb' => 'c,r,u',
            'nfc' => 'c,r,u',
            'qr' => 'c,r,u',
            'counter' => 'c,r,u',
            'historialerb' => 'c,r,u',
            'historialnfc' => 'c,r,u',
            'historialqr' => 'c,r,u',
            'historialcounter' => 'c,r,u'

        ],
        'disable' => [
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
