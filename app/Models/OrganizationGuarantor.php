<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationGuarantor extends Model
{
    use HasFactory;

    protected $table = 'organization_guarantors';
    protected $fillable = [
        'name',
        'registration_number',
        'loan_id'
    ];
}
