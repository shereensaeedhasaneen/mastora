<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldInquiry extends Model
{
    use HasFactory;


    protected $fillable = [
        "reputation",
        "permanent",
        "project_description",
        "project_type",
        "project_cost",
        "project_revenue",
        "project_period",
        "home_description",
        "is_owner",
        "rent",
        'loan_id'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
