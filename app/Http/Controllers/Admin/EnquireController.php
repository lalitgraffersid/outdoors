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
use App\User;
use App\Models\Enquire;
use App\Models\AdminPermission;
use App\DataTables\ContactDataTable;
use App\Helpers\AdminHelper;

class EnquireController extends Controller
{
    //=================================================================

	public function index()
	{
		$data= Enquire::all();
    
		//$data= Brand::paginate(10);
        return view('admin/enquires/index',['enquires'=>$data]);
		//return $dataTable->render('admin/brands/index');
	}

    public function view($id)
    {
    	$data['result'] = Enquire::find($id);

    	return view('admin.enquires.view',$data);
    }
    public function delete($id){
		
		try {
			$data = Enquire::find($id)->delete();
		
			session()->flash('message', 'Enquire deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/enquires/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/enquires/index');
        }
    }
}