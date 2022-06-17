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
use App\Models\Enquire;
use App\Models\Setting;

class EnquireController extends Controller
{
	public function enquire()
	{
		 $data = [];
		$data['settings'] = Setting::first();

		return view('front/products/enquire');
	}


    //====================================

	public function enquireSave(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name'       => 'required',
                'product'       => 'required',
				'email'      => 'required',
				'contact_no' => 'required',
				'subject' 	 => 'required',
				'message' 	 => 'required',
				'captcha' 	 => 'required|captcha'
			]);
			if ($validator->fails()) { 	
	            return redirect('enquire')
	                        ->withErrors($validator)
	                        ->withInput();
			} else { 		        
	        	$enquire = new Enquire;
		        $enquire->name = $request->name;
                $enquire->product = $request->product;
				$enquire->contact_no = $request->contact_no;
		        $enquire->email = $request->email;
		        $enquire->subject = $request->subject;
		        $enquire->message = $request->message;
	        	$enquire->save();
	            
	            $Setting = Setting::first();
	            
				$data = array(
		            'name' => $request->name,
                    'product' => $request->product,
		            'email' => $request->email,
		            'contact_no' => $request->contact_no,
		            'subject' => $request->subject,
		            'email_message' => $request->message,
		            'admin_email' => $Setting->email,
		            'title' => 'Outdoor Structures::Enquire'
	        	);
			
	        	Mail::send('front.emails.emailEnquire', $data, function ($message) use ($data) {
		    		$message->from($data['email'], 'Outdoor Structures enquire');
					//$message->to($data['info@outdoorstructuresireland.com']);
					$message->to('jaiswallalit21@gmail.com');
		    		$message->subject($data['subject']);
	    		});

                if (Mail::failures()) {
                    $msg_error="Something went wrong!";
                 $request->session()->flash('msg_error', $msg_error);
                 return redirect('enquire');
             }else{
                 $msg="Add sucessfully..";
                 $request->session()->flash('msg', $msg);
                 return redirect('enquire');
             }
               //==== end mail script ======
               session()->flash('message', 'Contact added successfully');
               Session::flash('alert-class', 'alert-success'); 
               return redirect('enquire');
               
               }
           
           } catch (\Exception $e) {
               Log::error($e->getMessage());
               session()->flash('message', 'Some error occured during mail sent');
               Session::flash('alert-class', 'alert-danger');
                  return redirect('enquire');
              
        		// if (Mail::failures()) {
			    //    	session()->flash('message', 'Mail not sent!');
				// 	Session::flash('alert-type', 'error'); 
				// 	return redirect('enquire');
		    	// }



	        	//==== end mail script ======
		// 		session()->flash('message', 'enquire mail sent successfully.');
		// 		Session::flash('alert-type', 'success'); 
		// 		return redirect('enquire');
		// 	}
		// } catch (\Exception $e) {
	    //     Log::error($e->getMessage());
	    //     session()->flash('message', 'Some error occured during mail sent');
        //     Session::flash('alert-type', 'error');
        //    	return redirect('enquire');  
        }
	}
	
	//====================================

	public function refreshCaptcha()
    {
        return response()->json([
            'captcha'=> captcha_img('flat')
        ]);
    }



}