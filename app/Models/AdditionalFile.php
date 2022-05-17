<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalFile extends Model
{
    use HasFactory;

    protected $table = 'additional_files';
    protected $fillable = [
        "file_name",
        "stored_path",
        "loan_id",
    ];

    public function loan()
    {
        return $this->belongs(Loan::class);
    }
}
