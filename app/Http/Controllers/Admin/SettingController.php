<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Input;
use Auth;
use Cookie;
use Session;
use DB;
use Image;
use File;
use Exception;
use App\Models\Setting;
use App\Models\AdminPermission;
use App\Helpers\AdminHelper;

class SettingController extends Controller
{
    //=================================================================

	public function index()
	{
		$data = array();
		$data['result'] = Setting::first();

		return view('admin/setting/index',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'facebook_link' => 'required',
				'instagram_link' => 'required',
				'twitter_link' => 'required',
				'linkedin_link' => 'required',
				'email' => 'required',
				'address' => 'required',
				'name_1' => 'required',
				'phone_1' => 'required',
				'name_2' => 'required',
				'phone_2' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/setting/index')
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = Setting::find($request->id);
		        //=========================================================
		        $data->facebook_link = $request->facebook_link;
		        $data->instagram_link = $request->instagram_link;
		        $data->twitter_link = $request->twitter_link;
		        $data->linkedin_link = $request->linkedin_link;
		        $data->email = $request->email;
		        $data->address = $request->address;
		        $data->name_1 = $request->name_1;
		        $data->phone_1 = $request->phone_1;
		        $data->name_2 = $request->name_2;
		        $data->phone_2 = $request->phone_2;
		        $data->save();

				session()->flash('message', 'Setting updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/setting/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save setting');
            Session::flash('alert-type', 'error');
           	return redirect('admin/setting/index');
        }
	}

	//=================================================================

}
