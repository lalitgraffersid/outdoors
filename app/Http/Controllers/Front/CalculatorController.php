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
use App\Models\Calculator;
use App\Models\Setting;

class CalculatorController extends Controller
{

    public function getcalculator(Request $req)
	{
        //  print_r($req->product);
        //  die();
        $data = array(
            
            'product' => $req->product,
            'length' => $req->length,
            'width' => $req->width,
            'price-section' => $req->price-section

            
        );
    // echo '<pre>';print_r($data['product']);die();
    // //  die();

        
    //     $data= $req->input('all');
        

    //     $req->session()->put('all',$data);

		 return view('front/calculator',compact('data'));
	}

	public function calculator()
	{
		 $data = [];
		$data['settings'] = Setting::first();

		return view('front/calculator');
	}


    //====================================

	public function calculatorSave(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name'       => 'required',
                'product'       => 'required',
                'length'       => 'required',
                'width'       => 'required',
				'email'      => 'required',
				'contact_no' => 'required',
				'subject' 	 => 'required',
				'message' 	 => 'required',
				'captcha' 	 => 'required|captcha'
			]);
			if ($validator->fails()) { 	
	            return redirect('calculator')
	                        ->withErrors($validator)
	                        ->withInput();
			} else { 		        
	        	$calculator = new Calculator;
		        $calculator->name = $request->name;
                $calculator->product = $request->product;
                $calculator->length = $request->length;
                $calculator->width = $request->width;
				$calculator->contact_no = $request->contact_no;
		        $calculator->email = $request->email;
		        $calculator->subject = $request->subject;
		        $calculator->message = $request->message;
	        	$calculator->save();
	            $Setting = Setting::first();
	            
				$data = array(
		            'name' => $request->name,
                    'product' => $request->product,
                    'length' => $request->length,
                    'width' => $request->width,
		            'email' => $request->email,
		            'contact_no' => $request->contact_no,
		            'subject' => $request->subject,
		            'email_message' => $request->message,
		            'admin_email' => $Setting->email,
		            'title' => 'Outdoor Structures::calculator'
	        	);
			
	        	Mail::send('front.emails.emailEnquire', $data, function ($message) use ($data) {
		    		$message->from($data['email'], 'Outdoor Structures calculator');
					//$message->to($data['info@outdoorstructuresireland.com']);
					$message->to('jaiswallalit21@gmail.com');
		    		$message->subject($data['subject']);
	    		});

                if (Mail::failures()) {
                    $msg_error="Something went wrong!";
                 $request->session()->flash('msg_error', $msg_error);
                 return redirect('calculator');
             }else{
                 $msg="Add sucessfully..";
                 $request->session()->flash('msg', $msg);
                 return redirect('calculator');
             }
               //==== end mail script ======
               session()->flash('message', 'Contact added successfully');
               Session::flash('alert-class', 'alert-success'); 
               return redirect('calculator');
               
               }
           
           } catch (\Exception $e) {
               Log::error($e->getMessage());
               session()->flash('message', 'Some error occured during mail sent');
               Session::flash('alert-class', 'alert-danger');
                  return redirect('calculator');
              
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