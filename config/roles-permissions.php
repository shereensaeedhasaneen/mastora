<?php
use App\Enums\SystemRoles;

return [

    /*
    |--------------------------------------------------------------------------
    | custom:
    |--------------------------------------------------------------------------
    |
    | Map all controller resource to one of CRUD operations
    |
    */
    'crud_of_resources' => [
        'index' => 'retrieve',
        'show' => 'retrieve',
        'search' => 'retrieve',
        'create' => 'create',
        'store' => 'create',
        'edit' => 'update',
        'update' => 'update',
        'destroy' => 'delete',
        'export' => 'export',
        'approve' => 'approve',
    ],

    /*
    |--------------------------------------------------------------------------
    | User Roles
    |--------------------------------------------------------------------------
    |
    | All user role that will created by default in seeding process
    |
    */
    'roles' => [
        SystemRoles::SUPER_ADMIN => ['is_admin_role' => true],
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions per entities.
    |--------------------------------------------------------------------------
    |
    | Available permissions for each entity
    |
    */
    'permissions_entities' => [
        'create' => [
            'user',
            'page',
        ],
        'retrieve' => [
            'user',
            'setting',
            'page',
            'dashboard',
        ],
        'update' => [
            'user',
            'setting',
            'page',
        ],
        'delete' => [
            'page',
            'user',
        ],
        'export' => [
            'user',
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Super admin permissions
    |--------------------------------------------------------------------------
    |
    | Define all super admin permissions
    |
    */
    'super_admin_permissions' => '*',

    /*
    |--------------------------------------------------------------------------
    | Other roles permissions list
    |--------------------------------------------------------------------------
    |
    | Define other roles permissions below, using this name schema [role-name]_permissions
    |
    */

    //'editor_permissions' => [ 'retrieve page', 'create user'],
];
