<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_owner',
        'rent',
        'number_of_rooms',
        'is_shared_bathroom',
        'houes_status',
        'furniture_status',
        'house_needs',
        'furniture_description',
        'notes',
        'loan_id'
    ];
}
