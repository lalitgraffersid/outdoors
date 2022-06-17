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
use App\Models\Banner;
use App\Models\AdminPermission;
use App\DataTables\BannerDataTable;
use App\Helpers\AdminHelper;

class BannerController extends Controller
{
    //=================================================================

	public function index(BannerDataTable $dataTable)
	{
		return $dataTable->render('admin/banners/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();

		return view('admin/banners/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'description' => 'required',
				'file' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/banners/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        //=========================================================
		        $file = $request->file('file');
		        if (!empty($file)) {
		        	$mime = $file->getClientOriginalExtension();
					if($mime == 'jpg' || $mime == 'jpeg' || $mime == 'png'){
						$file_type = 'Image';
					    $filename = rand('1111','9999').'_'.time().'.'.$mime;
				        $destinationPath = public_path('/admin/clip-one/assets/banners/thumbnail');
				        
				        $img = Image::make($file->getRealPath());

				        $img->resize(100, 100, function ($constraint) {
						    $constraint->aspectRatio();
						})->save($destinationPath.'/'.$filename);

						$destinationPath = public_path('/admin/clip-one/assets/banners/original');
				        $file->move($destinationPath, $filename);

				        $source_url = public_path().'/admin/clip-one/assets/banners/original/'.$filename;
		    			$destination_url = public_path().'/admin/clip-one/assets/banners/original/'.$filename;
		    			$quality = 40;

		    			AdminHelper::compress_image($source_url, $destination_url, $quality);
					}else {
						$file_type = 'Video';
					    $filename = rand('1111','9999').'_'.time().'.'.$mime;

						$destinationPath = public_path('/admin/clip-one/assets/banners/videos');
				        $file->move($destinationPath, $filename);
					}
		        }

		        //=========================================================
		        $data = new Banner;
		        //=========================================================
		        $data->description = $request->description;
		        $data->file_type = $file_type;
		        $data->file = $filename;
		        $data->save();

				session()->flash('message', 'Banner added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/banners/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Banner');
            Session::flash('alert-type', 'error');
           	return redirect('admin/banners/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Banner::find($id);

		return view('admin/banners/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'description' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/banners/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {

		        $data = Banner::find($request->id);
				//=========================================================
				$file = $request->file('file');
		        if (!empty($file)) {
		        	$file1 = public_path().'/admin/clip-one/assets/banners/thumbnail/'.$data->file;
        			$file2 = public_path().'/admin/clip-one/assets/banners/original/'.$data->file;
        			$file3 = public_path().'/admin/clip-one/assets/banners/videos/'.$data->file;
        			File::delete($file1, $file2,$file3);

		        	$mime = $file->getClientOriginalExtension();
					if($mime == 'jpg' || $mime == 'jpeg' || $mime == 'png'){
						$file_type = 'Image';
					    $filename = rand('1111','9999').'_'.time().'.'.$mime;
				        $destinationPath = public_path('/admin/clip-one/assets/banners/thumbnail');
				        
				        $img = Image::make($file->getRealPath());

				        $img->resize(100, 100, function ($constraint) {
						    $constraint->aspectRatio();
						})->save($destinationPath.'/'.$filename);

						$destinationPath = public_path('/admin/clip-one/assets/banners/original');
				        $file->move($destinationPath, $filename);

				        $source_url = public_path().'/admin/clip-one/assets/banners/original/'.$filename;
		    			$destination_url = public_path().'/admin/clip-one/assets/banners/original/'.$filename;
		    			$quality = 40;

		    			AdminHelper::compress_image($source_url, $destination_url, $quality);
					}else {
						$file1 = public_path().'/admin/clip-one/assets/banners/thumbnail/'.$data->file;
	        			$file2 = public_path().'/admin/clip-one/assets/banners/original/'.$data->file;
	        			$file3 = public_path().'/admin/clip-one/assets/banners/videos/'.$data->file;
	        			File::delete($file1, $file2,$file3);

						$file_type = 'Video';
					    $filename = rand('1111','9999').'_'.time().'.'.$mime;

						$destinationPath = public_path('/admin/clip-one/assets/banners/videos');
				        $file->move($destinationPath, $filename);
					}
		        }else{
		        	$file_type = $data->file_type;
		        	$filename = $data->file;
		        }
		        //=========================================================
		        $data->description = $request->description;
		        $data->file_type = $file_type;
		        $data->file = $filename;
		        $data->save();

				session()->flash('message', 'Banner updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/banners/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Banner');
            Session::flash('alert-type', 'error');
           	return redirect('admin/banners/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Banner::find($id);
			$file1 = public_path().'/admin/clip-one/assets/banners/original/'.$data->file;
			$file2 = public_path().'/admin/clip-one/assets/banners/thumbnail/'.$data->file;
			$file3 = public_path().'/admin/clip-one/assets/banners/videos/'.$data->file;
			File::delete($file1,$file2,$file3);

			Banner::where('id',$id)->delete();
		
			session()->flash('message', 'Banner deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/banners/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/banners/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id)
	{	
		try {
			
			$data = Banner::find($id);
			
			if($data->status == '1')
			{
				$status = '0';
			} 
			else 
			{
				$status = '1';
			}
			$data->status = $status;
			$data->save();
			
		
			session()->flash('message', 'Banner status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/banners/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/banners/index');
        }
    }

    //===================================================
}
