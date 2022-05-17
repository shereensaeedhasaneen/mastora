<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankBranch extends Model
{
    use HasFactory;
    
    protected $table = 'bank_branches';
    protected $fillable = [
        'name',
        'country_id'
    ];

    
}
