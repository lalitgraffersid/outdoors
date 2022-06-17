<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Auth;
use Cookie;
use Illuminate\Http\Request;
use Validator;
use Input;
use App\Models\User;
use App\Models\Setting;
use Session;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Category;
use App\Models\Dealer;

class BrandController extends Controller
{
    //====================================

	public function index()
	{
		$data = array();
		$data['dealers'] = Dealer::get();

		return view('front/brand/index',$data);
	}
	//====================================



}
