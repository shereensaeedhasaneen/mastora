<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankBrancheTranslation extends Model
{
    use HasFactory;

    protected $table = 'bank_branche_translations';
    protected $fillable = [
        'name',
        'locale'
    ];
}
