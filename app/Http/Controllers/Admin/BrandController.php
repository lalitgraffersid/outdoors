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
use App\Models\Brand;
use App\Models\AdminPermission;
use App\DataTables\BrandDataTable;
use App\Helpers\AdminHelper;

class BrandController extends Controller
{
    //=================================================================

	public function index()
	{
		$data= Brand::all();
    
		//$data= Brand::paginate(10);
        return view('admin/brands/index',['brands'=>$data]);
		//return $dataTable->render('admin/brands/index');
	}


	
	//=================================================================

	public function add()
	{
		return view('admin/brands/add');
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'image' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/brands/add')
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = new Brand;
		        //=====================================================
		        $image = $request->file('image');
				if(!empty($image)) {
		        	$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
		        	$destinationPath = public_path('/admin/clip-one/assets/brands/thumbnail');
	        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/brands/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$quality = 40;
        			AdminHelper::compress_image($source_url, $destination_url, $quality);
        		}else{
        			$imagename = '';	
        		}
		        //=====================================================
		        $data->name = $request->name;
		        $slug_name = Str::slug($request->name, '-');
		        $data->brand_slug = $slug_name;
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Brand added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/brands/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Brand');
            Session::flash('alert-type', 'error');
           	return redirect('admin/brands/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Brand::find($id);

		return view('admin/brands/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/brands/edit/'.$request->id)
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = Brand::find($request->id);
		        //=====================================================
		        $image = $request->file('image');
				if(!empty($image)) {
					$file1 = '/admin/clip-one/assets/brands/thumbnail/'.$data->image;
        			$file2 = '/admin/clip-one/assets/brands/original/'.$data->image;
        			File::delete($file1, $file2);

		        	$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
		        	$destinationPath = public_path('/admin/clip-one/assets/brands/thumbnail');
	        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/brands/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$quality = 40;
        			AdminHelper::compress_image($source_url, $destination_url, $quality);
        		}else{
        			$imagename = $data->image;
        		}
		        //=====================================================
		        $data->name = $request->name;
		        $slug_name = Str::slug($request->name, '-');
		        $data->brand_slug = $slug_name;
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Brand updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/brands/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Brand');
            Session::flash('alert-type', 'error');
           	return redirect('admin/brands/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Brand::find($request->id);
			$file1 = '/admin/clip-one/assets/brands/thumbnail/'.$data->image;
			$file2 = '/admin/clip-one/assets/brands/original/'.$data->image;
			File::delete($file1, $file2);
			
			Brand::find($id)->delete();
		
			session()->flash('message', 'Brand deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/brands/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/brands/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Brand::find($id);
			
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
			
		
			session()->flash('message', 'Brand status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/brands/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/brands/index');
        }
    }

    //===================================================

}
