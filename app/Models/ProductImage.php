<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
	protected $table = 'product_images';
   
   //use SoftDeletes;
   //protected $dates = ['deleted_at'];
}