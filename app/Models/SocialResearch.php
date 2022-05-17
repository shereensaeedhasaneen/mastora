<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_owner',
        'is_shared_bathroom',
        'rent',
        'number_of_rooms',
        'houes_status',
        'furniture_status',
        'house_needs',
        'furniture_description',
        'notes',
        'loan_id',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
