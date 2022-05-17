<?php

use App\Enums\SystemRoles;

return [
    /*
    |--------------------------------------------------------------------------
    | User Roles
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'roles' => [
        SystemRoles::DEVELOPER => SystemRoles::DEVELOPER,
        SystemRoles::SUPER_ADMIN => SystemRoles::SUPER_ADMIN,
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions CRUD
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    'permissions_crud' => [
        'create' => 'create',
        'read_one_mine' => 'read one mine',
        'read_one_theirs' => 'read one theirs',
        'read_all_mine' => 'read all mine',
        'read_all_theirs' => 'read all theirs',
        'delete_mine' => 'delete mine',
        'delete_theirs' => 'delete theirs',
        'update_mine' => 'update mine',
        'update_theirs' => 'update theirs'
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions Models
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    'resources' => [
        'users' => 'users',
        'roles' => 'roles',
        'permissions' => 'permissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    'actions' => [
        'show' => 'show',
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
        'search' => 'search',
        'search-ajax' => 'search-ajax',
        'export' => 'export',
    ],

    'resources_actions_permissions' => [
        'users' => [
            'create' => [
                'create users'
            ],
            'store' => [
                'create users'
            ],
            'show' => [
                'read one mine users',
                'read one theirs users',
            ],
            'edit' => [
                'read one mine users',
                'read one theirs users',
            ],
            'update' => [
                'update mine users',
                'update theirs users',
            ],
            'index' => [
                'read all mine users',
                'read all theirs users',
            ],
            'destroy' => [
                'delete mine users',
                'delete theirs users',
            ],
            'search-ajax' => [
                'read all mine users',
                'read all theirs users',
            ],
            'export' => [
                'read all mine users',
                'read all theirs users',
            ],
        ],
        'permissions' => [
            'create' => [
                'create permissions'
            ],
            'store' => [
                'create permissions'
            ],
            'show' => [
                'read one mine permissions',
                'read one theirs permissions',
            ],
            'edit' => [
                'read one mine permissions',
                'read one theirs permissions',
            ],
            'update' => [
                'update mine permissions',
                'update theirs permissions',
            ],
            'index' => [
                'read all mine permissions',
                'read all theirs permissions',
            ],
            'destroy' => [
                'delete mine permissions',
                'delete theirs permissions',
            ],
            'search-ajax' => [
                'read all mine permissions',
                'read all theirs permissions',
            ],
            'export' => [
                'read all mine permissions',
                'read all theirs permissions',
            ],
        ],
        'roles' => [
            'create' => [
                'create roles'
            ],
            'store' => [
                'create roles'
            ],
            'show' => [
                'read one mine roles',
                'read one theirs roles',
            ],
            'edit' => [
                'read one mine roles',
                'read one theirs roles',
            ],
            'update' => [
                'update mine roles',
                'update theirs roles',
            ],
            'index' => [
                'read all mine roles',
                'read all theirs roles',
            ],
            'destroy' => [
                'delete mine roles',
                'delete theirs roles',
            ],
            'search-ajax' => [
                'read all mine roles',
                'read all theirs roles',
            ],
            'export' => [
                'read all mine roles',
                'read all theirs roles',
            ],
        ],

        'product-categories' => [
            'create' => [
                'create product categories'
            ],
            'store' => [
                'create product categories'
            ],
            'show' => [
                'read one mine product categories',
                'read one theirs product categories',
            ],
            'edit' => [
                'read one mine product categories',
                'read one theirs product categories',
            ],
            'update' => [
                'update mine product categories',
                'update theirs product categories',
            ],
            'index' => [
                'read all mine product categories',
                'read all theirs product categories',
            ],
            'destroy' => [
                'delete mine product categories',
                'delete theirs product categories',
            ],
            'search-ajax' => [
                'read all mine product categories',
                'read all theirs product categories',
            ],
            'export' => [
                'read all mine product categories',
                'read all theirs product categories',
            ],
        ],
        'countries' => [
            'create' => [
                'create countries'
            ],
            'store' => [
                'create countries'
            ],
            'show' => [
                'read one mine countries',
                'read one theirs countries',
            ],
            'edit' => [
                'read one mine countries',
                'read one theirs countries',
            ],
            'update' => [
                'update mine countries',
                'update theirs countries',
            ],
            'index' => [
                'read all mine countries',
                'read all theirs countries',
            ],
            'destroy' => [
                'delete mine countries',
                'delete theirs countries',
            ],
            'search-ajax' => [
                'read all mine countries',
                'read all theirs countries',
            ],
            'export' => [
                'read all mine countries',
                'read all theirs countries',
            ],
        ],
        'cities' => [
            'create' => [
                'create cities'
            ],
            'store' => [
                'create cities'
            ],
            'show' => [
                'read one mine cities',
                'read one theirs cities',
            ],
            'edit' => [
                'read one mine cities',
                'read one theirs cities',
            ],
            'update' => [
                'update mine cities',
                'update theirs cities',
            ],
            'index' => [
                'read all mine cities',
                'read all theirs cities',
            ],
            'destroy' => [
                'delete mine cities',
                'delete theirs cities',
            ],
            'search-ajax' => [
                'read all mine cities',
                'read all theirs cities',
            ],
            'export' => [
                'read all mine cities',
                'read all theirs cities',
            ],
        ],
        'bank_branchs' => [
            'create' => [
                'create bank branchs'
            ],
            'store' => [
                'create bank branchs'
            ],
            'show' => [
                'read one mine bank branchs',
                'read one theirs bank branchs',
            ],
            'edit' => [
                'read one mine bank branchs',
                'read one theirs bank branchs',
            ],
            'update' => [
                'update mine bank branchs',
                'update theirs bank branchs',
            ],
            'index' => [
                'read all mine bank branchs',
                'read all theirs bank branchs',
            ],
            'destroy' => [
                'delete mine bank branchs',
                'delete theirs bank branchs',
            ],
            'search-ajax' => [
                'read all mine bank branchs',
                'read all theirs bank branchs',
            ],
            'export' => [
                'read all mine bank branchs',
                'read all theirs bank branchs',
            ],
        ],
    ],
];
