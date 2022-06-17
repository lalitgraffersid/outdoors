<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   	protected $table = 'products';
   	protected $fillable  = 'order_no';
	
	protected $casts = [
        'price' => 'decimal:2',
    ];

}