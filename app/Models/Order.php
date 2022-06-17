<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
   
	public $table = 'orders';
	public $timestamps = false;
}