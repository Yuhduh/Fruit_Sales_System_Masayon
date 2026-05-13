<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fruit extends Model
{
    protected $table = 'fruits';
    protected $fillable = [
        'fruit_name',
        'category',
        'price',
        'stock_quantity',
        'description',
        'is_available',
    ];
}
