<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonGuarantor extends Model
{
    use HasFactory;

    protected $table = 'user_parteners';
    protected $fillable = [
        'name',
        'national_id',
        'loan_id'
    ];
}
