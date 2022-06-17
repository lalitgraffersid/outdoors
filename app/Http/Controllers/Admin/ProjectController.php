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
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Category;
use App\Models\AdminPermission;
use App\DataTables\ProjectDataTable;
use App\Helpers\AdminHelper;

class ProjectController extends Controller
{
    //=================================================================

	public function index(ProjectDataTable $dataTable)
	{
		return $dataTable->render('admin/projects/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();
		$data['categories'] = Category::where('status','1')->get();

		return view('admin/projects/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'short_description' => 'required',
				'long_description' => 'required',
				'featured_image' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/projects/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        //=========================================================
		        $image_featured = $request->file('featured_image');
		        if (!empty($image_featured)) {
		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image_featured->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/projects/featured_image/thumbnail');
			        
			        $img = Image::make($image_featured->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/projects/featured_image/original');
			        $image_featured->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/projects/featured_image/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/projects/featured_image/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }
		        //=========================================================
		        $data = new Project;
		        //=========================================================
		       	$data->category_id = $request->category_id;
		       	$data->title = $request->title;
		        $data->short_description = $request->short_description;
		        $data->long_description = $request->long_description;
		        $data->featured_image = $featured_image;
		        $data->save();

		        $images = $request->file('additional_images');
				foreach ($images as $key => $image) {
					$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/projects/additional_images/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/projects/additional_images/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/projects/additional_images/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/projects/additional_images/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

        			$additional_images = new ProjectImage;
        			$additional_images->project_id = $data->id;
        			$additional_images->image = $imagename;
        			$additional_images->save();
				}

				session()->flash('message', 'Project added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/projects/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Project');
            Session::flash('alert-type', 'error');
           	return redirect('admin/projects/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Project::find($id);
		$data['additionalImages'] = ProjectImage::where('project_id',$id)->get();
		$data['categories'] = Category::where('status','1')->get();

		return view('admin/projects/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'short_description' => 'required',
				'long_description' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/projects/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {

		        $data = Project::find($request->id);
				//=========================================================
		        $image_featured = $request->file('featured_image');
		        if (!empty($image_featured)) {
		        	$file1 = public_path().'/admin/clip-one/assets/projects/featured_image/thumbnail/'.$data->featured_image;
        			$file2 = public_path().'/admin/clip-one/assets/projects/featured_image/original/'.$data->featured_image;
        			File::delete($file1, $file2);

		        	$featured_image = rand('1111','9999').'_'.time().'.'.$image_featured->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/projects/featured_image/thumbnail');
			        
			        $img = Image::make($image_featured->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$featured_image);

					$destinationPath = public_path('/admin/clip-one/assets/projects/featured_image/original');
			        $image_featured->move($destinationPath, $featured_image);

			        $source_url = public_path().'/admin/clip-one/assets/projects/featured_image/original/'.$featured_image;
	    			$destination_url = public_path().'/admin/clip-one/assets/projects/featured_image/original/'.$featured_image;
	    			$quality = 40;

	    			AdminHelper::compress_image($source_url, $destination_url, $quality);
		        }else{
		        	$featured_image = $data->featured_image;
		        }
		        //=========================================================
		       	$data->category_id = $request->category_id;
		       	$data->title = $request->title;
		        $data->short_description = $request->short_description;
		        $data->long_description = $request->long_description;
		        $data->featured_image = $featured_image;
		        $data->save();

		        $images = $request->file('additional_images');
		        if (!empty($images)) {
		        	foreach ($images as $key => $image) {
						$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('/admin/clip-one/assets/projects/additional_images/thumbnail');
				        
				        $img = Image::make($image->getRealPath());

				        $img->resize(100, 100, function ($constraint) {
						    $constraint->aspectRatio();
						})->save($destinationPath.'/'.$imagename);

						$destinationPath = public_path('/admin/clip-one/assets/projects/additional_images/original');
				        $image->move($destinationPath, $imagename);

				        $source_url = public_path().'/admin/clip-one/assets/projects/additional_images/original/'.$imagename;
	        			$destination_url = public_path().'/admin/clip-one/assets/projects/additional_images/original/'.$imagename;
	        			$quality = 40;

	        			AdminHelper::compress_image($source_url, $destination_url, $quality);

	        			$additional_image = new ProjectImage;
	        			$additional_image->project_id = $request->id;
	        			$additional_image->image = $imagename;
	        			$additional_image->save();
					}
		        }

				session()->flash('message', 'Project updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/projects/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Project');
            Session::flash('alert-type', 'error');
           	return redirect('admin/projects/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Project::find($id);
			$images = ProjectImage::where('project_id',$id)->get();

			foreach ($images as $key => $value) {
				$file1 = public_path().'/admin/clip-one/assets/projects/additional_images/original/'.$value->image;
				$file2 = public_path().'/admin/clip-one/assets/projects/additional_images/thumbnail/'.$value->image;
				File::delete($file1,$file2);
			}
			$file3 = public_path().'/admin/clip-one/assets/projects/featured_image/thumbnail/'.$data->featured_image;
			File::delete($file3);

			Project::where('id',$id)->delete();
			ProjectImage::where('project_id',$id)->delete();
		
			session()->flash('message', 'Project deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/projects/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/projects/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id)
	{	
		try {
			
			$data = Project::find($id);
			
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
			
		
			session()->flash('message', 'Project status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/projects/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/projects/index');
        }
    }

    //===================================================

    public function imageDelete($id){
		
		try {
			$data = ProjectImage::find($id);

			$file1 = public_path().'/admin/clip-one/assets/projects/additional_images/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/projects/additional_images/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = ProjectImage::where('id',$id)->delete();
		
			return response()->json(['msg'=>'success']);
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    return response()->json(['msg'=>'error']);
        }
    }

}
