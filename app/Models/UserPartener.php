<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPartener extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'national_id',
        'loan_id'
    ];
}
