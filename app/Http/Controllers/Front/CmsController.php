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
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Pcategory;

use App\Models\Page;
use App\Models\AdditionalImage;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\Project;
use App\Models\ProjectImage;

class CmsController extends Controller
{
    //====================================

	public function about_us()
	{
		$data = [];
		$data['result'] = Page::where('title','LIKE','%about%')->first();
		$data['images'] = AdditionalImage::where('page_id',$data['result']->id)->get();

		return view('front/about_us',$data);
	}

	//====================================

	public function services($id)
	{
		$data = [];
		$data['result'] = Service::where('id',$id)->first();
		$data['images'] = ServiceImage::where('service_id',$data['result']->id)->get();

		return view('front/services',$data);
	}

	//====================================

	public function projects($id)
	{
		$data = [];
		$data['category'] = Category::where('id',$id)->first();
		$data['results'] = Project::where('category_id',$id)->get();

		return view('front/projects',$data);
	}

	//====================================

	public function projectDetails($id)
	{
		$data = [];
		$data['result'] = Project::where('id',$id)->first();
		$data['images'] = ProjectImage::where('project_id',$data['result']->id)->get();

		return view('front/projectDetails',$data);
	}

	//====================================

	public function gallery()
	{
		$data = [];
		$results = Gallery::where('status','1')->get();
		$data['results'] = $results;

		return view('front/gallery',$data);
	}

	//====================================

	public function contact_us()
	{
		$data = [];
		$data['settings'] = Setting::first();

		return view('front/contact_us',$data);
	}

	//====================================

	public function privacy_policy()
	{
		$data = [];
		$results = Page::where('title','LIKE','%privacy%')->first();
		$data['result'] = $results;

		return view('front/privacy_policy',$data);
	}

	//====================================
	public function products()
	{
		$data = array();
		$data['results'] = Pcategory::where('status','1')->paginate(6);		

        
		return view('front/home/index',$data);
	}
}
