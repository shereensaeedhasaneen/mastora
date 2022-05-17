<?php

namespace App\Models;

/**
 * Class Setting
 *
 * @package App\Models
 */

use App\Models\Helpers\SettingHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Setting
 *
 * @property $key
 * @property $value
 * @property $description
 * @package App\Models
 */
class Setting extends Model
{
    use SettingHelper, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
        'description',
    ];
}
