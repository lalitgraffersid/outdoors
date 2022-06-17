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
use App\Models\Gallery;
use App\Models\SubCategory;
use App\Models\AdminPermission;
use App\DataTables\GalleryDataTable;
use App\Helpers\AdminHelper;

class GalleryController extends Controller
{
    //=================================================================

	public function index(GalleryDataTable $dataTable)
	{
		return $dataTable->render('admin/gallery/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();

		return view('admin/gallery/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'image' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/gallery/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        //===========================================
				$images = $request->file('image');
				//dd($product); die;
				if(!empty($images)) {
					foreach ($images as $key => $image) {
						$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();

						$destinationPath = public_path('/admin/clip-one/assets/gallery/image');
				        $image->move($destinationPath, $imagename);

				        $source_url = public_path().'/admin/clip-one/assets/gallery/image/'.$imagename;
	        			$destination_url = public_path().'/admin/clip-one/assets/gallery/image/'.$imagename;
	        			$quality = 50;

	        			AdminHelper::compress_image($source_url, $destination_url, $quality);
	        			
	        			$data = new Gallery;	
	        			$data->image = $imagename;
		        		$data->save();
					}
				}

				session()->flash('message', 'Gallery added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/gallery/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Gallery');
            Session::flash('alert-type', 'error');
           	return redirect('admin/gallery/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Gallery::find($id);

		return view('admin/gallery/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {		        
	        $data = Gallery::find($request->id);

	        //===========================================
			$image = $request->file('image');
			//dd($product); die;
			if(!empty($image)) {
				$file1 = public_path().'/admin/clip-one/assets/gallery/image/'.$data->image;
				File::delete($file1);

	        	$before_imagename = time().'.'.$image->getClientOriginalExtension();

				$destinationPath = public_path('/admin/clip-one/assets/gallery/image');
		        $image->move($destinationPath, $before_imagename);

		        $source_url = public_path().'/admin/clip-one/assets/gallery/image/'.$before_imagename;
    			$destination_url = public_path().'/admin/clip-one/assets/gallery/image/'.$before_imagename;
    			$quality = 50;

    			AdminHelper::compress_image($source_url, $destination_url, $quality);

			} else {
				$imagename = $data->image;
			}
				
	        //=========================================================
	        $data->image = $imagename;
	        $data->save();

			session()->flash('message', 'Gallery updated successfully');
			Session::flash('alert-type', 'success'); 
			return redirect('admin/gallery/index');
			
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Gallery');
            Session::flash('alert-type', 'error');
           	return redirect('admin/gallery/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Gallery::find($id);

			$file1 = public_path().'/admin/clip-one/assets/gallery/image/'.$data->image;
			File::delete($file1);

			$delete = Gallery::where('id',$id)->delete();
		
			session()->flash('message', 'Gallery deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/gallery/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/gallery/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Gallery::find($id);
			
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
			
		
			session()->flash('message', 'Gallery update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/gallery/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/gallery/index');
        }
    }

    //===================================================

}
