<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanUserStatus extends Model
{
    use HasFactory;
    protected $table = 'loan_user_statuses';
    protected $fillable = [
        'loan_id',
        'user_id',
        'notes'
    ];
}
