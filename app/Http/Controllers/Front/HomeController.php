<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Auth;
use Cookie;
use Illuminate\Http\Request;
use Validator;
use Input;
use App\Models\User;
use Session;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Product;
use App\Models\Page;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Category;
use App\Models\Pcategory;
use App\Models\Testimonial;
use App\Models\Banner;

class HomeController extends Controller
{
    //====================================

	public function index()
	{
		$data = array();
		$data['about_us'] = Page::where('title','LIKE','%about%')->first();
		$data['services'] = Service::where('status','1')->get();
		$data['galleries'] = Gallery::where('status','1')->limit('3')->get();
		$data['settings'] = Setting::first();
		$data['categories'] = Category::where('status','1')->get();
		$data['banners'] = Banner::where('status','1')->get();
		$data['testimonials'] = Testimonial::where('status','1')->get();
		$data['results'] = Pcategory::where('status','1')->paginate(6);

		// echo "<pre>";
		// print_r($data['services']);die;

		return view('front/home/index',$data);
	}
	//====================================



}
