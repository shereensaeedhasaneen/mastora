<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "dateOfBirth",
        "social_status",
        "national_id",
        "eduction_status",
        "job",
        "income",
        "type",
        "in_home",
        "description",
        'loan_id'
    ];
}
