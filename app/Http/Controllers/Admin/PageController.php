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
use App\Models\Page;
use App\Models\AdditionalImage;
use App\Models\AdminPermission;
use App\DataTables\PageDataTable;
use App\Helpers\AdminHelper;

class PageController extends Controller
{
    //=================================================================

	public function index(PageDataTable $dataTable)
	{
		return $dataTable->render('admin/pages/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();

		return view('admin/pages/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'description' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/pages/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        //=========================================================
		        $image_featured = $request->file('featured_image');
		        if (!empty($image_featured)) {
		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image_featured->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/pages/featured_image/thumbnail');
			        
			        $img = Image::make($image_featured->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/pages/featured_image/original');
			        $image_featured->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/pages/featured_image/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/pages/featured_image/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }
		        //=========================================================
		        $data = new Page;
		        //=========================================================
		       	$data->name = $request->name;
		       	$data->title = $request->title;
		        $data->description = $request->description;
		        $data->featured_image = $featured_image;
		        $data->save();

		        $images = $request->file('additional_images');
				foreach ($images as $key => $image) {
					$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/pages/additional_images/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/pages/additional_images/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/pages/additional_images/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/pages/additional_images/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

        			$additional_images = new AdditionalImage;
        			$additional_images->page_id = $data->id;
        			$additional_images->image = $imagename;
        			$additional_images->save();
				}

				session()->flash('message', 'Page added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/pages/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Page');
            Session::flash('alert-type', 'error');
           	return redirect('admin/pages/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Page::find($id);
		$data['additionalImages'] = AdditionalImage::where('page_id',$id)->get();

		return view('admin/pages/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'description' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/pages/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {

		        $data = Page::find($request->id);
				//=========================================================
		        $image_featured = $request->file('featured_image');
		        if (!empty($image_featured)) {
		        	$file1 = public_path().'/admin/clip-one/assets/pages/featured_image/thumbnail/'.$data->featured_image;
        			$file2 = public_path().'/admin/clip-one/assets/pages/featured_image/original/'.$data->featured_image;
        			File::delete($file1, $file2);

		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image_featured->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/pages/featured_image/thumbnail');
			        
			        $img = Image::make($image_featured->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/pages/featured_image/original');
			        $image_featured->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/pages/featured_image/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/pages/featured_image/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }else{
		        	$featured_image = $data->featured_image;
		        }
		        //=========================================================
		        $data->name = $request->name;
		       	$data->title = $request->title;
		        $data->description = $request->description;
		        $data->featured_image = $featured_image;
		        $data->save();

		        $images = $request->file('additional_images');
		        if (!empty($images)) {
		        	foreach ($images as $key => $image) {
						$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('/admin/clip-one/assets/pages/additional_images/thumbnail');
				        
				        $img = Image::make($image->getRealPath());

				        $img->resize(100, 100, function ($constraint) {
						    $constraint->aspectRatio();
						})->save($destinationPath.'/'.$imagename);

						$destinationPath = public_path('/admin/clip-one/assets/pages/additional_images/original');
				        $image->move($destinationPath, $imagename);

				        $source_url = public_path().'/admin/clip-one/assets/pages/additional_images/original/'.$imagename;
	        			$destination_url = public_path().'/admin/clip-one/assets/pages/additional_images/original/'.$imagename;
	        			$quality = 40;

	        			AdminHelper::compress_image($source_url, $destination_url, $quality);

	        			$additional_image = new AdditionalImage;
	        			$additional_image->page_id = $request->id;
	        			$additional_image->image = $imagename;
	        			$additional_image->save();
					}
		        }

				session()->flash('message', 'Page updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/pages/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Page');
            Session::flash('alert-type', 'error');
           	return redirect('admin/pages/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Page::find($id);
			$images = AdditionalImage::where('product_id',$id)->get();

			foreach ($images as $key => $value) {
				$file1 = public_path().'/admin/clip-one/assets/pages/additional_images/original/'.$value->image;
				$file2 = public_path().'/admin/clip-one/assets/pages/additional_images/thumbnail/'.$value->image;
				File::delete($file1,$file2);
			}
			$file3 = public_path().'/admin/clip-one/assets/pages/featured_image/thumbnail/'.$data->featured_image;
			$file4 = public_path().'/admin/clip-one/assets/pages/featured_image/original/'.$data->featured_image;
			File::delete($file3,$file4);

			Page::where('id',$id)->delete();
			AdditionalImage::where('product_id',$id)->delete();
		
			session()->flash('message', 'Page deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/pages/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/pages/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Page::find($id);
			
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
			
		
			session()->flash('message', 'Page status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/pages/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/pages/index');
        }
    }

    //===================================================

    public function imageDelete($id){
		
		try {
			$data = AdditionalImage::find($id);

			$file1 = public_path().'/admin/clip-one/assets/pages/additional_images/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/pages/additional_images/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = AdditionalImage::where('id',$id)->delete();
		
			return response()->json(['msg'=>'success']);
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    return response()->json(['msg'=>'error']);
        }
    }

}
