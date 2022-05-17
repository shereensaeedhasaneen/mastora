<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = [ 'title' , 'description' ,  'notes' ];

    protected $table = 'product_categories';
    protected $fillable = [
        'creator_id',
        'last_updater_id',
    ];


}
