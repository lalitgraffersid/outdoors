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
use App\Models\Contact;
use App\Models\Setting;

class ContactController extends Controller
{
	//====================================

	public function contact_us()
	{
		$data = [];
		$data['settings'] = Setting::first();

		return view('front/contact_us',$data);
	}

	//====================================

	public function contactSave(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name'       => 'required',
				'email'      => 'required',
				'contact_no' => 'required',
				'subject' 	 => 'required',
				'message' 	 => 'required',
				'captcha' 	 => 'required|captcha'
			]);
			if ($validator->fails()) { 	
	            return redirect('contact_us')
	                        ->withErrors($validator)
	                        ->withInput();
			} else { 		        
	        	$contact = new Contact;
		        $contact->name = $request->name;
		        $contact->email = $request->email;
		        $contact->contact_no = $request->contact_no;
		        $contact->subject = $request->subject;
		        $contact->message = $request->message;
	        	$contact->save();
	            
	            $Setting = Setting::first();
	            
				$data = array(
		            'name' => $request->name,
		            'email' => $request->email,
		            'contact_no' => $request->contact_no,
		            'subject' => $request->subject,
		            'email_message' => $request->message,
		            'admin_email' => $Setting->email,
		            'title' => 'Outdoor Structures::Contact'
	        	);
			
	        	Mail::send('front.emails.emailContact', $data, function ($message) use ($data) {
		    		$message->from($data['email'], 'Outdoor Structures Contact');
					//$message->to($data['admin_email']);
					$message->to('vikas.nagar@commediait.com');
		    		$message->subject($data['subject']);
	    		});

        		if (Mail::failures()) {
			       	session()->flash('message', 'Mail not sent!');
					Session::flash('alert-type', 'error'); 
					return redirect('contact_us');
		    	}

	        	//==== end mail script ======
				session()->flash('message', 'Contact mail sent successfully.');
				Session::flash('alert-type', 'success'); 
				return redirect('contact_us');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during mail sent');
            Session::flash('alert-type', 'error');
           	return redirect('contact_us');  
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
