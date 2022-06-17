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
use App\Models\Testimonial;
use App\Models\AdminPermission;
use App\DataTables\TestimonialDataTable;
use App\Helpers\AdminHelper;

class TestimonialController extends Controller
{
    //=================================================================

	public function index(TestimonialDataTable $dataTable)
	{
		return $dataTable->render('admin/testimonials/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();

		return view('admin/testimonials/add',$data);
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
	            return redirect('admin/testimonials/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $data = new Testimonial;
		        //=========================================================
		       	$data->name = $request->name;
		        $data->description = $request->description;
		        $data->save();

				session()->flash('message', 'Testimonial added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/testimonials/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Testimonial');
            Session::flash('alert-type', 'error');
           	return redirect('admin/testimonials/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Testimonial::find($id);

		return view('admin/testimonials/edit',$data);
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
	            return redirect('admin/testimonials/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $data = Testimonial::find($request->id);
				//=========================================================
		        $data->name = $request->name;
		        $data->description = $request->description;
		        $data->save();

				session()->flash('message', 'Testimonial updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/testimonials/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Testimonial');
            Session::flash('alert-type', 'error');
           	return redirect('admin/testimonials/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			Testimonial::where('id',$id)->delete();
		
			session()->flash('message', 'Testimonial deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/testimonials/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/testimonials/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id)
	{	
		try {
			$data = Testimonial::find($id);
			
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
			
		
			session()->flash('message', 'Testimonial status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/testimonials/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/testimonials/index');
        }
    }

    //===================================================

}
