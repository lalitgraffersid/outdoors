<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;
use Cookie;
use Illuminate\Http\Request;
use Validator;
use Input;
use Session;
use DB;
use Image;
use File;
use Mail;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\MailingList;

class MailingListController extends Controller
{
	//====================================

	public function mailingListSave(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name'       => 'required',
				'email'      => 'required'
			]);
			if ($validator->fails()) { 	
	            return redirect('home')
	                        ->withErrors($validator)
	                        ->withInput();
			} else { 		        
	        	$contact = new MailingList;
		        $contact->name = $request->name;
		        $contact->email = $request->email;
	        	$contact->save();

	        	//==== end mail script ======
				session()->flash('message', 'Saved successfully.');
				Session::flash('alert-type', 'success'); 
				return redirect()->back();
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured!');
            Session::flash('alert-type', 'error');
           	return redirect()->back();  
        }
	}

}
