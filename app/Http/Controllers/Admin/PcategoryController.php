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
use App\Models\Pcategory;
use App\Models\AdminPermission;
use App\DataTables\PcategoryDataTable;
use App\Helpers\AdminHelper;

class PcategoryController extends Controller
{
    //=================================================================

	public function index()
	{
		$data= pcategory::all();

		//echo '<pre>';print_r($data[0]->brand->name);
    
		//$data= Brand::paginate(10);
        return view('admin/pcategories/index',['pcategorys'=>$data]);
	}
	// public function index(PcategoryDataTable $dataTable)
	// {
	// 	return $dataTable->render('admin/pcategories/index');
	// }
	//=================================================================

	public function add()
	{
		$data = [];
		$data['brands'] = Brand::where('status','1')->get();
        
		return view('admin/pcategories/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'brand_id' => 'required',
				'title' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/pcategories/add')
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = new Pcategory;
		        $image = $request->file('image');
				if(!empty($image)) {
		        	$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
		        	$destinationPath = public_path('/admin/clip-one/assets/category/thumbnail');
	        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/category/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$quality = 40;
        			AdminHelper::compress_image($source_url, $destination_url, $quality);
        		}else{
        			$imagename = '';	
        		}
		        $data->brand_id = $request->brand_id;
		        $data->title = $request->title;
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Category added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/pcategories/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Category');
            Session::flash('alert-type', 'error');
           	return redirect('admin/pcategories/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Pcategory::find($id);
		$data['brands'] = Brand::where('status','1')->get();

		return view('admin/pcategories/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'brand_id' => 'required',
				'title' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/pcategories/edit/'.$request->id)
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = Pcategory::find($request->id);
		        $image = $request->file('image');
				if(!empty($image)) {
					$file1 = '/admin/clip-one/assets/category/thumbnail/'.$data->image;
        			$file2 = '/admin/clip-one/assets/category/original/'.$data->image;
        			File::delete($file1, $file2);

		        	$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
		        	$destinationPath = public_path('/admin/clip-one/assets/category/thumbnail');
	        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/category/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$quality = 40;
        			AdminHelper::compress_image($source_url, $destination_url, $quality);
        		}else{
        			$imagename = $data->image;
        		}
        		
		        $data->brand_id = $request->brand_id;
		        $data->title = $request->title;
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Category updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/pcategories/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Category');
            Session::flash('alert-type', 'error');
           	return redirect('admin/pcategories/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			Pcategory::find($id)->delete();
		
			session()->flash('message', 'Category deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/pcategories/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/pcategories/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Pcategory::find($id);
			
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
			
		
			session()->flash('message', 'Category status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/pcategories/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/pcategories/index');
        }
    }

    //===================================================

}
