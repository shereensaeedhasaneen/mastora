<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 *
 * @package App\Models
 */
class Role extends SpatieRole
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_admin_role',
        'guard_name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_admin_role' => 'boolean',
    ];
}
