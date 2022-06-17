<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{
   	protected $table = 'pcategories';

	   public function brand(Type $var = null)
	   {
		//    return $this->hasOne(Brand::class);
		return $this->hasOne(Brand::class, 'id', 'brand_id');
	   }
}