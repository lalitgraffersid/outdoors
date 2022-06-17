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
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\AdminPermission;
use App\DataTables\ServiceDataTable;
use App\Helpers\AdminHelper;

class ServiceController extends Controller
{
    //=================================================================

	public function index(ServiceDataTable $dataTable)
	{
		return $dataTable->render('admin/services/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();

		return view('admin/services/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'description' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/services/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        //=========================================================
		        $image_featured = $request->file('featured_image');
		        if (!empty($image_featured)) {
		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image_featured->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/services/featured_image/thumbnail');
			        
			        $img = Image::make($image_featured->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/services/featured_image/original');
			        $image_featured->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/services/featured_image/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/services/featured_image/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }
		        //=========================================================
		      
		        //=========================================================
		       	// $data->title = $request->title;
		        // // $data->description = $request->description;
		        // $data->featured_image = $featured_image;
		        // $data->save();
// ************************************************************************

$content = $request->description;
       $dom = new \DomDocument();
	  
       $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	
       $imageFile = $dom->getElementsByTagName('img');
   
       foreach($imageFile as $item => $image){
		
           $data = $image->getAttribute('src');

           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);

           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
	
           $path = public_path() . $image_name;
	
           file_put_contents($path, $imgeData);
           $new_src=asset('public'.$image_name);
           $image->removeAttribute('src');
		   $image->setAttribute('class','mul');
           $image->setAttribute('src',$new_src);
        }
 
       $content = $dom->saveHTML();
	   $data = new Service();
	   $data->title = $request->title;
	   $data->description = $content;
	   $data->featured_image = $featured_image;
	
	    $data->save();
// ***********************************************************************

		        $images = $request->file('additional_images');
				foreach ($images as $key => $image) {
					$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/services/additional_images/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/services/additional_images/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/services/additional_images/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/services/additional_images/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

        			$additional_images = new ServiceImage;
        			$additional_images->service_id = $data->id;
        			$additional_images->image = $imagename;
        			$additional_images->save();
				}

				session()->flash('message', 'Service added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/services/index');
			}
		} catch (\Exception $e) {
			echo '<pre>';print_r($e->getMessage());die;
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Service');
            Session::flash('alert-type', 'error');
           	return redirect('admin/services/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Service::find($id);
		$data['additionalImages'] = ServiceImage::where('service_id',$id)->get();

		return view('admin/services/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'description' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/services/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {

		        $data = Service::find($request->id);
				//=========================================================
		        $image_featured = $request->file('featured_image');
		        if (!empty($image_featured)) {
		        	$file1 = public_path().'/admin/clip-one/assets/services/featured_image/thumbnail/'.$data->featured_image;
        			$file2 = public_path().'/admin/clip-one/assets/services/featured_image/original/'.$data->featured_image;
        			File::delete($file1, $file2);

		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image_featured->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/services/featured_image/thumbnail');
			        
			        $img = Image::make($image_featured->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/services/featured_image/original');
			        $image_featured->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/services/featured_image/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/services/featured_image/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }else{
		        	$featured_image = $data->featured_image;
		        }
		        //=========================================================
		       	// $data->title = $request->title;
		        // $data->description = $request->description;
		        // $data->featured_image = $featured_image;
		        // $data->save();
// ************************************************************************

$content = $request->description;
       $dom = new \DomDocument();
	  
       $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	
       $imageFile = $dom->getElementsByTagName('img');
   
       foreach($imageFile as $item => $image){
		
           $data = $image->getAttribute('src');
		    
		   	if (strpos($data, 'http') !== false) {
			// echo 'true';  die;
			$image->setAttribute('class','mul');
			$image->setAttribute('src',$data);
		}else{
		   

           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);

           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
	
           $path = public_path() . $image_name;
	
           file_put_contents($path, $imgeData);
           $new_src=asset('public'.$image_name);
           $image->removeAttribute('src');
		   $image->setAttribute('class','mul');
           $image->setAttribute('src',$new_src);
        }
	   }
 
       $content = $dom->saveHTML();
	  $data = Service::find($request->id);
	   $data->title = $request->title;
	   $data->description = $content;
	   $data->featured_image = $featured_image;
	
	    $data->save();
// ***********************************************************************


		        $images = $request->file('additional_images');
		        if (!empty($images)) {
		        	foreach ($images as $key => $image) {
						$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('/admin/clip-one/assets/services/additional_images/thumbnail');
				        
				        $img = Image::make($image->getRealPath());

				        $img->resize(100, 100, function ($constraint) {
						    $constraint->aspectRatio();
						})->save($destinationPath.'/'.$imagename);

						$destinationPath = public_path('/admin/clip-one/assets/services/additional_images/original');
				        $image->move($destinationPath, $imagename);

				        $source_url = public_path().'/admin/clip-one/assets/services/additional_images/original/'.$imagename;
	        			$destination_url = public_path().'/admin/clip-one/assets/services/additional_images/original/'.$imagename;
	        			$quality = 40;

	        			AdminHelper::compress_image($source_url, $destination_url, $quality);

	        			$additional_image = new ServiceImage;
	        			$additional_image->service_id = $request->id;
	        			$additional_image->image = $imagename;
	        			$additional_image->save();
					}
		        }

				session()->flash('message', 'Service updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/services/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Service');
            Session::flash('alert-type', 'error');
           	return redirect('admin/services/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Service::find($id);
			$images = ServiceImage::where('service_id',$id)->get();

			foreach ($images as $key => $value) {
				$file1 = public_path().'/admin/clip-one/assets/services/additional_images/original/'.$value->image;
				$file2 = public_path().'/admin/clip-one/assets/services/additional_images/thumbnail/'.$value->image;
				File::delete($file1,$file2);
			}
			$file3 = public_path().'/admin/clip-one/assets/services/featured_image/thumbnail/'.$data->featured_image;
			File::delete($file3);

			Service::where('id',$id)->delete();
			ServiceImage::where('service_id',$id)->delete();
		
			session()->flash('message', 'Service deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/services/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/services/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id)
	{	
		try {
			
			$data = Service::find($id);
			
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
			
		
			session()->flash('message', 'Service status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/services/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/services/index');
        }
    }

    //===================================================

    public function imageDelete($id){
		
		try {
			$data = ServiceImage::find($id);

			$file1 = public_path().'/admin/clip-one/assets/services/additional_images/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/services/additional_images/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = ServiceImage::where('id',$id)->delete();
		
			return response()->json(['msg'=>'success']);
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    return response()->json(['msg'=>'error']);
        }
    }

}
