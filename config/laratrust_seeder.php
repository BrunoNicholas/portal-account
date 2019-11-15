<?php

return [
    'role_structure' => [
        'super-admin' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'company-admin' => [
            'profile' => 'r,u'
        ],
        'salon-admin' => [
            'profile' => 'r,u'
        ],
        'shop-admin' => [
            'profile' => 'r,u'
        ],
        'salon-worker' => [
            'profile' => 'r,u'
        ],
        'shop-worker' => [
            'profile' => 'r,u'
        ],
        'barber' => [
            'profile' => 'r,u'
        ],
        'client' => [
            'profile' => 'r,u'
        ],
        'guest' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
