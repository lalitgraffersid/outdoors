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
use App\Models\Category;
use App\Models\AdminPermission;
use App\DataTables\CategoryDataTable;
use App\Helpers\AdminHelper;

class CategoryController extends Controller
{
    //=================================================================

	public function index(CategoryDataTable $dataTable)
	{
		return $dataTable->render('admin/categories/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();
		return view('admin/categories/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'description' => 'required',
				'image' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/categories/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        //=========================================================
		        $image = $request->file('image');
		        if (!empty($image)) {
		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/categories/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/categories/original');
			        $image->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/categories/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/categories/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }
		        //=========================================================
		        $data = new Category;
		        //=========================================================
		       	$data->name = $request->name;
		        $data->description = $request->description;
		        $data->image = $featured_image;
		        $data->save();

				session()->flash('message', 'Category added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/categories/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Category');
            Session::flash('alert-type', 'error');
           	return redirect('admin/categories/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Category::find($id);

		return view('admin/categories/edit',$data);
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
	            return redirect('admin/categories/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {

		        $data = Category::find($request->id);
				//=========================================================
		        $image = $request->file('image');
		        if (!empty($image)) {
		        	$file1 = public_path().'/admin/clip-one/assets/categories/thumbnail/'.$data->image;
        			$file2 = public_path().'/admin/clip-one/assets/categories/original/'.$data->image;
        			File::delete($file1, $file2);

		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/categories/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/categories/original');
			        $image->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/categories/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/categories/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }else{
		        	$featured_image = $data->image;
		        }
		        //=========================================================
		       	$data->name = $request->name;
		        $data->description = $request->description;
		        $data->image = $featured_image;
		        $data->save();

				session()->flash('message', 'Category updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/categories/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Category');
            Session::flash('alert-type', 'error');
           	return redirect('admin/categories/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Category::find($id);
			$file1 = public_path().'/admin/clip-one/assets/categories/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/categories/original/'.$data->image;
			File::delete($file1,$file2);

			Category::where('id',$id)->delete();
		
			session()->flash('message', 'Category deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/categories/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/categories/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id)
	{	
		try {
			
			$data = Category::find($id);
			
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
	        return redirect('admin/categories/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/categories/index');
        }
    }

    //===================================================

}
