<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   	protected $table = 'brands';

	   public function pcategory(Type $var = null)
	   {
		   return $this->belongsTo(pcategory::class);
	   }
}