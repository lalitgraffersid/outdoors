<?php
/*****************************************************
# Cart Controller             
# Class name : CartController
# Author :    
# Created Date : 
# Functionality : 
/*****************************************************/
namespace App\Http\Controllers\Front;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator, Mail, Exception;
use Crypt, Image;

use App\Models\Cms;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Cart;
use App\Models\Eventbook;
use App\Models\Eventsbooks_detail;

use App\Models\CartDetail;
use App\Helpers\CommonHelper;
use App\Models\Setting;
use Carbon\Carbon;

use Cookie;
use Session;

use Hash;
use Auth;

use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;


/*
|--------------------------------------------------------------------------
|CartController
|--------------------------------------------------------------------------
|
| index
|
*/
class CartController extends Controller
{
    /*
        * Function name : index
        * Purpose : View Cart page
        * Author  :
        * Created Date : 
        * Modified date :
        * Params : void
        * Return : void
    */

    
    public function index()
    {
        
		$data = array();
	    $ip             =   session()->getId();
        $arCart         =   $this->getCartId($ip);
        $data['cart']   =   Cart::find($arCart['cartId']);
		// echo '<pre>';print_r($arCart);die;
				
				
			$data['cms_data'] = (object) array(
			'page_title' 		=>	'product',
			'meta_description'	=>	'product',
			'meta_keyword'		=>	'product'
		);
		$settings = Setting::where('id', 1)->first();
		$data['settings'] = $settings;
		return view('front.carts.index',$data);
		
    }

   /*
        * Function name : checkout
        * Purpose : View checkout page
        * Author  :
        * Created Date : 
        * Modified date :
        * Params : void
        * Return : void
    */

 function rand_act( $length =8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ') {
		return substr( str_shuffle( $chars ), 0, $length );
		}
   
    public function checkout()
    {
        /*$data['cmsdata'] = Cms::where('slug', 'cart')->first();
        $ip             =   session()->getId();
        $arCart         =   $this->getCartId($ip);
        $data['cart']   =   Cart::find($arCart['cartId']);
        return view('front.carts.checkout', $data);*/
		
		
		$data = array();
	    $ip             =   session()->getId();
	  
        $arCart         =   $this->getCartId($ip);
        //   echo '<pre>';print_r($arCart);die;
        $data['cart']   =   Cart::find($arCart['cartId']);
// 			echo '<pre>';print_r($data['cart']);die;		
				
			$data['cms_data'] = (object) array(
			'page_title' 		=>	'product',
			'meta_description'	=>	'product',
			'meta_keyword'		=>	'product'
		);
		$settings = Setting::where('id', 1)->first();
		$data['settings'] = $settings;
		return view('front.carts.checkout',$data);
	
    }

    public function saveCheckout(Request $request){
        
        try {
			$validator = Validator::make($request->all(), [
				'first_name'       => 'required',
                'last_name'        => 'required',
                'email'            => 'required|email',
                'phone'            => 'required|numeric|min:10',
				'country'          => 'required',
				'city'             => 'required',
				'address'          => 'required',
				'postcode'         => 'required',

			]);
			if ($validator->fails()) { 
				return redirect('/checkout')
							->withErrors($validator)
							->withInput();
            }else{
                $ip             =   session()->getId();
                $arCart         =   $this->getCartId($ip);
               // $arrSettings    =   \Helpers::getSiteSettingsData();
                $model = Cart::find($arCart['cartId']);
                
                if(!$model){
                    return redirect('/checkout')
							->withErrors($e->getMessage())
							->withInput();
                }
                $sub_total  =   0;
                foreach($model->details as $item){
                    $sub_total  =   $sub_total+$item->total_amount;
                }

                $model->first_name          =   $request->first_name;
                $model->last_name           =   $request->last_name;
                $model->email               =   $request->email;
                $model->phone               =   $request->phone;
                $model->country             =   $request->country;
                $model->city                =   $request->city;
                $model->address             =   $request->address;
                $model->postcode            =   $request->postcode;
                $model->self_pickup         =   isset($request->collect) ? 'Y':'N';
                $model->sub_total           =   $sub_total;
               // $model->delivery_charges    = isset($request->collect) ? 0 :$arrSettings->fixed_delivery_charge;
// email code
//$getPrice = DB::table('products')->select('products.*')->where('id',$productid)->first();
//$amount = $getPrice->price;

 $model->delivery_charges    = 0;

 $model->save();
 //saroj session(['btoken' => \Helpers::encryptId($arCart['cartId'])]);
 
  return redirect('/payment');
} 
 }catch (\Exception $e) {
		dd($e);
			   return redirect('/checkout')
							->withErrors($e->getMessage())
							->withInput();
	       
        }
    }

    /*
        * Function name : payment
        * Purpose : View payment page
        * Author  :
        * Created Date : 
        * Modified date :
        * Params : void
        * Return : void
    */

    
    public function payment()
    {
       /* $data['cmsdata'] = Cms::where('slug', 'cart')->first();
        // $ip             =   session()->getId();
        // $arCart         =   $this->getCartId($ip);
        $btoken     = 	session('btoken');
        $cartId		=	\Helpers::decryptId($btoken);
        
        $data['cart']   =   Cart::find($cartId);
		$start_year = date('Y');		
		$end_year = date('Y')+ 20;		
		$card_years=[];
		for($i=$start_year;$i<$end_year;$i++) $card_years[]=$i;
		$data['card_years'] = $card_years;
 
	    return view('front.carts.payment', $data);*/
		
		
		$data = array();
	    $ip             =   session()->getId();
        $arCart         =   $this->getCartId($ip);
        $data['cart']   =   Cart::find($arCart['cartId']);
			

		$start_year = date('Y');		
		$end_year = date('Y')+ 20;		
		$card_years=[];
		for($i=$start_year;$i<$end_year;$i++) $card_years[]=$i;
		$data['card_years'] = $card_years;		
				
			$data['cms_data'] = (object) array(
			'page_title' 		=>	'product',
			'meta_description'	=>	'product',
			'meta_keyword'		=>	'product'
		);
		$settings = Setting::where('id', 1)->first();
		$data['settings'] = $settings;
		return view('front.carts.payment',$data);
		
		
		
    }

	public function totalAmountToChargableAmount($goalAmount="",$fixedProcessingFee="",$processingFeePercentage="",$vat_percent=0)
	{
		//https://support.stripe.com/questions/can-i-charge-my-stripe-fees-to-my-customers
		$vat_factor=1;
		if($vat_percent>0) $vat_factor=1+($vat_percent/100);

		$F_fixed=$fixedProcessingFee*$vat_factor;
		
	
		$F_percent=($processingFeePercentage/100)*$vat_factor;
		
		$chargableAmount = ($goalAmount+$F_fixed)/(1 - $F_percent);
		
	
		return round($chargableAmount,2);
	}
	
	public function getcardTokenJson($card_number="",$exp_month="",$exp_year="",$cvv_number="")
	{
		$stripe = Stripe::make('pk_test_pGttS8PtNxb9HVh9Oe32pdyU00RUjFA8VR');
		$success=0;
		$tokenJSON ="";
		$error = "";
		try{
			$cardInfo = [
						'number' => $card_number, 
						'exp_month' => $exp_month, 
						'exp_year' => $exp_year, 
						'cvc'=>$cvv_number
					];
			
			$token = $stripe->tokens()->create([
				'card' => $cardInfo,
			]);
			
			$tokenJSON = json_encode($token);
			$success=1;
			
		} catch (Exception $e) {
			// Something else happened, completely unrelated to Stripe
			$error = $e->getMessage();
		}		
		return $returnData=array('success'=>$success,'error'=>$error,'tokenJSON'=>$tokenJSON);
	}
	
	public function isEuropeanCard($countryCode="")
	{
		$stripe_european_country = ['AD','AT','BE','BG','HR','CY','CZ','DK','EE','FO','FI','FR','DE','GI','GR','GL','GG','VA','HU','IS','IE','IM','IT','JE','LV','LI','LT','LU','MT','MC','NL','NO','PL','PT','RO','PM','SM','SK','SI','ES','SJ','SE','CH','GB'];
		if(in_array($countryCode,$stripe_european_country))
			return 1;
		else
			return 0;
	}

    /*****The function below will be used to just identify actual charge amount for display***/
    public function ajaxCalculateProcessingFeeStripeCart(Request $request)
    {
        $btoken     = 	session('btoken');
        //saroj$cartId		=	\Helpers::decryptId($btoken);
        //added saroj
		
		$data = array();
	    $ip             =   session()->getId();
        $arCart         =   $this->getCartId($ip);
        $data['cart']   =   Cart::find($arCart['cartId']);
		// end added saroj
	
		$response 	=	[];
        $success 	= 	'';
        $error 		= 	'';
       $data = Session::all();

        // echo "<pre>";
        // print_r($data);
        // exit;
		
		     try{

          //  $data['cart']   =   Cart::find($cartId);
		   //added saroj
		
		$data = array();
	    $ip             =   session()->getId();
        $arCart         =   $this->getCartId($ip);
        $data['cart']   =   Cart::find($arCart['cartId']);
		// end added saroj
            // echo $data['cart']->email;
            // exit;
            
            // exit;
            $booking_price	=	($data['cart']->sub_total+$data['cart']->delivery_charges); //cart total with delivery charges
        
            $card_number 	= 	$request->card_number;	//$this->request->data('card_number');
            $exp_month 		= 	$request->exp_month;	//$this->request->data('exp_month');
            $exp_year 		= 	$request->exp_year;		//$this->request->data('exp_year');
            $cvv_number 	= 	$request->cvv_number;	//$this->request->data('cvv_number');
            
            $response 		= 	$this->getcardTokenJson($card_number,$exp_month,$exp_year,$cvv_number);
            $success 		= 	$response['success'];
            $error 			= 	$response['error'];

            // dd($response);
            
            if($success)
            {
                $european 		= 'N';
                $cardTokenJson 	= $response['tokenJSON'];
                $cardJsonArray 	= json_decode($cardTokenJson);
                $cardTokenId 	= $cardJsonArray->id;
                $cardCountry 	= $cardJsonArray->card->country;
                
                /*---------------------------------------------- Checking european card start -------------------------*/
                $isEuropeanCard  = $this->isEuropeanCard($cardCountry);
                /*---------------------------------------------- Checking european card end ---------------------------*/
                
                $processingFeePercent = env('stripe_non_european_fee_percent'); //non european
                $processingFeeFixed = env('stripe_non_european_fee_fixed'); //non european
                $vat_p = env('stripe_ie_vat_percent');
                
                //if($cardCountry!='IE') $vat_p = 0;
                
                if($isEuropeanCard)
                {
                    $processingFeePercent = env('stripe_european_fee_percent'); //european
                    $processingFeeFixed =env('stripe_european_fee_fixed'); //european
                    $european='Y';
                }
                
                $amount	=	$booking_price; // Amount variable contains basic value with 23% vat on which chargeable amount to overhead processing fee on customer
                
                $chargableAmount = $this->totalAmountToChargableAmount($amount,$processingFeeFixed,$processingFeePercent,$vat_p);
                $rand= mt_rand(100000,99999999);
                $user= $data['cart']->email;
                
            
            $affected = DB::table('carts')
            ->where('id', $data['cart']->id)
            ->update(['pin_number' => $rand]);

                $response = array(
                                    'success'=>$success,
                                    'error'=>$error,
                                    'amount' => $amount,
                                    'processingFee'=>round(($chargableAmount-$amount),2),
                                    'total'=>round($chargableAmount,2),
                                    'tokenID'=>$cardTokenId,
                                    'processingFeePercent'=>$processingFeePercent,
                                    'processingFeeFixed'=>$processingFeeFixed,
                                    'isEuropeanCard'=>$european,
                                    'vat_p'=>$vat_p
                                );
            }
            else
            {
                $response = array(
                                'success'=>$success,
                                'error'=>$error,
                            );
            }
        }catch(\Exception $e){
            $response = array(
                            'success'=>$success,
                            'error'=>$e->getMessage(),
                        );
        }
        echo json_encode($response);
    }

    //=====================================
    public function paymentSave(Request $request) {
        
        
      
        $apiKey="";
       
        $charge_trans_id	= '';
        try{
            // echo 'ajay';die;
            $stripe = Stripe::make('sk_test_Vy4MPhjolLK2cGA1htnSU5SH00ozDEbGNm');
            // $stripe = Stripe::make('sk_test_51KBGKkSJLu6FFJ22BH1FdwI0jwOIMMNqD2A8XGnNk2cdTjK9zQZMDVrWokxQ5WKI1zmArmbqDYgTnZ9XVV46GBW700S7MstKzk');
            //   echo '<pre>';print_r($stripe);die;
            
            $btoken     = 	session('btoken');
         $booking_id		=	base64_decode($btoken);
             
		//added saroj
		$data = array();
	    $ip             =   session()->getId();
	    
        $arCart         =   $this->getCartId($ip);
        
        $cartId		=	$arCart['cartId'];
        
		$data['cart']   =   Cart::find($arCart['cartId']);
		 
		// end added saroj
		  //saroj  $cartId		=	\Helpers::decryptId($btoken);
             
           
		    $booking_data 	= 	array();

            $bookingDetails = 	Cart::where('id', $cartId)->first();
            
             
             //save booking details//
            

            
            
             
             
            
             
            
             
             
        	$card_number 	= 	$request->card_number;	//$this->request->data('card_number');
			$exp_month 		= 	$request->exp_month;	//$this->request->data('exp_month');
			$exp_year 		= 	$request->exp_year;		//$this->request->data('exp_year');
			$cvv_number 	= 	$request->cvv_number;	//$this->request->data('cvv_number');
			
			$response 		= 	$this->getcardTokenJson($card_number,$exp_month,$exp_year,$cvv_number);
			$success 		= 	$response['success'];
			$error 			= 	$response['error'];
			//dd($response['success']);
			if($success)
			{
			    
			    
			    
			      
            $eventbook = new eventbook;
            
         $eventbook->ip = $bookingDetails->ip;
          $eventbook->order_no = $booking_id;
         

         
          $eventbook->first_name = $bookingDetails->first_name;
          $eventbook->last_name = $bookingDetails->last_name;
          $eventbook->email = $bookingDetails->email;
          $eventbook->phone = $bookingDetails->phone;
          $eventbook->country = $bookingDetails->country;
          $eventbook->city = $bookingDetails->city;
          $eventbook->postcode = $bookingDetails->postcode;
          $eventbook->address = $bookingDetails->address;
          $eventbook->self_pickup = $bookingDetails->self_pickup;
          
           $eventbook->sub_total = $bookingDetails->sub_total;
           
            $eventbook->delivery_charges = $bookingDetails->delivery_charges;
            
             $eventbook->charge_trans_id = $bookingDetails->charge_trans_id;
              $eventbook->charge_amount = $bookingDetails->charge_amount;
               $eventbook->charge_json = $bookingDetails->charge_json;
                $eventbook->status = $bookingDetails->status;
                
                  $eventbook->created_at = $bookingDetails->created_at;
                  
                    $eventbook->updated_at = $bookingDetails->updated_at;
                    
                    $eventbook->deleted_at = $bookingDetails->deleted_at;
                    $eventbook->pin_number = $bookingDetails->pin_number;
                    
                    
                     
             $eventbook->save();
             
             $insertedIdd = $eventbook->id;
             
         
         $eventde = DB::select('select * from cart_details where cart_id = ?',[$cartId]);
        
        
        
        
        
        
         foreach($eventde as $evd)
         {
           
             $Eventsbooks_detail = new Eventsbooks_detail;
                     $Eventsbooks_detail->cart_id = $insertedIdd;
                     
                      $Eventsbooks_detail->product_id =$evd->product_id;
                       $Eventsbooks_detail->length = $evd->length;
                        $Eventsbooks_detail->width = $evd->width;
                         $Eventsbooks_detail->qty = $evd->qty;
                          $Eventsbooks_detail->base_price = $evd->base_price;
                          
                
                  
                  $Eventsbooks_detail->shipping_price = $evd->shipping_price;
                  $Eventsbooks_detail->additional_cost = $evd->additional_cost;
                  $Eventsbooks_detail->vat_p = $evd->vat_p;
                  $Eventsbooks_detail->vat_amount = $evd->vat_amount;
                  
                  $Eventsbooks_detail->total_amount = $evd->total_amount;
                  $Eventsbooks_detail->created_at = $evd->created_at;
                  $Eventsbooks_detail->updated_at = $evd->updated_at;
                  $Eventsbooks_detail->deleted_at = $evd->deleted_at;
                   $Eventsbooks_detail->save();
             
                    }
        
            
            
            DB::delete('delete from carts where id = ?',[$cartId]);
            
             DB::delete('delete from cart_details where cart_id = ?',[$cartId]);
            
     $booking_price	=	($bookingDetails->sub_total+$bookingDetails->delivery_charges); //cart total with delivery charges
            
            $prodDetails 	= 	$bookingDetails->details; 
            
           
        
        
			    
			    
			    
			    
			    
			    
			    
			    
			  
			  
			  
			    
				$european 		= 'N';
				$cardTokenJson 	= $response['tokenJSON'];
				$cardJsonArray 	= json_decode($cardTokenJson);
				$cardTokenId 	= $cardJsonArray->id;
				$cardCountry 	= $cardJsonArray->card->country;
				
				/*---------------------------------------------- Checking european card start -------------------------*/
				$isEuropeanCard  = $this->isEuropeanCard($cardCountry);
				/*---------------------------------------------- Checking european card end ---------------------------*/
				
				$processingFeePercent = env('stripe_non_european_fee_percent'); //non european
				$processingFeeFixed = env('stripe_non_european_fee_fixed'); //non european
				$vat_p = env('stripe_ie_vat_percent');
				
				//if($cardCountry!='IE') $vat_p = 0;
				
				if($isEuropeanCard)
				{
					$processingFeePercent = env('stripe_european_fee_percent'); //european
					$processingFeeFixed =env('stripe_european_fee_fixed'); //european
					$european='Y';
				}
				
				$amount	=	$booking_price; // Amount variable contains basic value with vat on which chargeable amount to overhead processing fee on customer
				
				$chargableAmount = $this->totalAmountToChargableAmount($amount,$processingFeeFixed,$processingFeePercent,$vat_p);
				
			
				 
				$charge = $stripe->charges()->create([
					'card'			=>	$cardTokenId,
					'description' 	=> 	'Charge for online booking by ',
					'currency' 		=> 	'EUR',
					'amount'   		=> 	$chargableAmount,
				]);
				//dd($charge);
				$charge_trans_id	=	$charge['id'];
				$charge_json		=	json_encode($charge);
				$data= array(
						'charge_trans_id'	=> 	$charge_trans_id,
						'charge_amount'		=> 	round($chargableAmount,2),
						'charge_json' 		=> 	$charge_json,
						'is_paid'			=>	'Y',
					);

	             Eventbook::where('id', $insertedIdd)->update($data);
			
				//dd($bookingSavedDetails);
				// $data = array(
				// 	'receipt_no' 	=> str_replace('ch_','',$bookingSavedDetails[0]->charge_trans_id),
				// 	'reg_date'		=> date('d, F Y'),
				// 	'title'			=> 'Lavery Logistics Ltd.',
				// 	'customer_name' => $bookingSavedDetails[0]->customer_name,
				// 	'customer_email'=> $bookingSavedDetails[0]->cust_email,
				// 	'customer_phone'=> $bookingSavedDetails[0]->contact_number,
				// 	'description' 	=> 'Booking charges for '.$prodDetails->product_name,
				// 	'booking_price' => $booking_price,
				// 	'tax'			=> ($bookingSavedDetails[0]->charge_amount - $booking_price),
				// 	'total_amount'	=> $bookingSavedDetails[0]->charge_amount
				// );
	
	
				// Mail::send('front.emails.emailInvoice', $data, function ($message) use($bookingSavedDetails){
				// 	$message->from('no-reply@laverylogistics.ie', 'Lavery Logistics Booking Invoice');
				// 	$message->to($bookingSavedDetails[0]->cust_email,$bookingSavedDetails[0]->customer_name)->subject('Lavery Logistics::Booking Invoice!');
				// });
				// Mail::send('front.emails.emailInvoice', $data, function ($message) use($bookingSavedDetails){
				// 	$message->from('no-reply@laverylogistics.ie', 'Lavery Logistics Booking Invoice');
				// 	$message->to('info@laverylogistics.ie',$bookingSavedDetails[0]->customer_name)->subject('Lavery Logistics::Booking Invoice!');
				// });
				
				
			
                \Session::forget('btoken');
                session()->flash('success', 'Your order request has been successfully processed. We will contact with you shortly!');
             
                return redirect()->route('front_view_cart')->with('type','1');
            }
            else
            {
                session()->flash('errors', $error);
                return redirect()->back()->withInput($request->all())->withError($e->getMessage());
            }
        }	
        catch(\Exception $e){
            throw($e);
            echo '<pre>';print_r($e->getMessage());die;
            session()->flash('errors', $e->getMessage());
            return redirect()->back()->withInput($request->all())->withError($e->getMessage());
            //return redirect()->route('booking');
        }

    }
    


    public function updateItem(Request $request){
        $response=[];
        try {
            $id=$request->id;
            $qty=$request->qty;
            $product_type=$request->product_type;

            $model = CartDetail::find($id);
            if(!$model){
                throw new Exception("No result was found for id: $id");
            }             
            $model->qty                =   $qty;
            $model->shipping_price     =   0;
            $model->additional_cost    =   0;
            $model->vat_p              =   $model->vat_p;
            

            if($product_type == 'D'){
                $vat_amount=0;
                $subtotal=$qty*(($model->length*$model->width)*$model->base_price);
                $vat_amount=($model->vat_p/100)*$subtotal;
            }else{
                $vat_amount=0;
                $subtotal=($qty*$model->base_price);
                $vat_amount=($model->vat_p/100)*$subtotal;
            }

            $model->vat_amount         =   $vat_amount;
            $model->total_amount       =   round(($subtotal+$vat_amount),2);
            $model->save();

            $response['status']=1;
            $response['success']='cart updated';

        }catch(Exception $e){
            //throw new \App\Exceptions\FrontException($e->getMessage());
            $response['status']=2;
            $response['error']=$e->getMessage();
        }
        return \json_encode($response);
    }

    public function removeItem(Request $request){
        $response=[];
        try {
            $id=$request->id;
            $model = CartDetail::find($id);
        //   print_r($model);die;
            if(!$model){
                throw new Exception("No result was found for id: $id");
            }             
            $model->delete();

            $response['status']=1;
            $response['success']='item removed';

        }catch(Exception $e){
            //throw new \App\Exceptions\FrontException($e->getMessage());
            $response['status']=2;
            $response['error']=$e->getMessage();
        }
        return \json_encode($response);
    }


    public function saveCart(Request $request){
		print_r($request->all()); die;
            $response['status']=1;
            $response['success']='Your product has been successfully added to cart.';

         return \json_encode($response);
    }

    public function reloadHeaderCart(){
	
	
        $ip         =   session()->getId();
        $arCart     =   $this->getCartId($ip);
        $cart=Cart::find($arCart['cartId']);

        $qtyCount=0;
        $cartAmount=0;
        $response='';
        if(isset($cart->details)){
        foreach($cart->details as $item){
            $qtyCount = $qtyCount + $item->qty;
            $cartAmount= $cartAmount + $item->total_amount;
            $cartAmount=number_format($cartAmount,2);
        }

        if(count($cart->details)>0){
            $response='<div class="dropdown">
            <button type="button" class="btn btn-common" data-toggle="dropdown">
                <svg id="icons" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#fff;}</style></defs><title/><path class="cls-1" d="M13,38H53a2,2,0,0,0,1.93-1.47l6-22A2,2,0,0,0,59,12H12.75L12,7.65A2,2,0,0,0,10,6H5a2,2,0,0,0,0,4H8.33l4.28,24A7,7,0,0,0,13,48h1.68a7,7,0,1,0,12.64,0H37.68a7,7,0,1,0,12.64,0H56a2,2,0,0,0,0-4H13a3,3,0,0,1,0-6ZM56.38,16,51.47,34H16.67L13.46,16ZM24,51a3,3,0,1,1-3-3A3,3,0,0,1,24,51Zm23,0a3,3,0,1,1-3-3A3,3,0,0,1,47,51Z"/></svg> Cart <span
                    class="badge badge-pill badge-danger">'.count($cart->details).'</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="row total-header-section">
                    <div class="col-lg-12 col-sm-12 col-sm-12 total-section">
                        <p>Total: <span class="text-info">€'.$cartAmount.'</span></p>
                    </div>
                </div>';
            foreach($cart->details as $item){                           
                $response.='<div class="row cart-detail">
                              <div class="col-lg-3 col-sm-3 col-3 cart-detail-img">
                                  <span class="heading">'.$item->product->name.'</span>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-9 cart-detail-product">
                                 <span class="heading">'.$item->product->name.'</span>
                                 <span class="price text-info">€'.$item->total_amount.'</span> <span class="count">Qty:'.$item->qty.'</span>
                              </div>
                           </div>';
            }

            $response.='<div class="row">
                              <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                 <a href="'.Route('front_view_cart').'" class="btn btn-primary btn-block">View all</a>
                              </div>
                           </div>
                        </div>
                     </div>';
        }else{
            $response='<div class="dropdown">
            <button type="button" class="btn btn-common" data-toggle="dropdown">
                <svg id="icons" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#fff;}</style></defs><title/><path class="cls-1" d="M13,38H53a2,2,0,0,0,1.93-1.47l6-22A2,2,0,0,0,59,12H12.75L12,7.65A2,2,0,0,0,10,6H5a2,2,0,0,0,0,4H8.33l4.28,24A7,7,0,0,0,13,48h1.68a7,7,0,1,0,12.64,0H37.68a7,7,0,1,0,12.64,0H56a2,2,0,0,0,0-4H13a3,3,0,0,1,0-6ZM56.38,16,51.47,34H16.67L13.46,16ZM24,51a3,3,0,1,1-3-3A3,3,0,0,1,24,51Zm23,0a3,3,0,1,1-3-3A3,3,0,0,1,47,51Z"/></svg> Cart <span
                    class="badge badge-pill badge-danger">'.count($cart->details).'</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="row total-header-section">
                    <div class="col-lg-12 col-sm-12 col-sm-12 total-section">
                        <p>Your cart is empty.</p>
                    </div>
                </div>
            </div>
        </div>';
        }
    }else{
        $response='<div class="dropdown">
        <button type="button" class="btn btn-common" data-toggle="dropdown">
            <svg id="icons" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#fff;}</style></defs><title/><path class="cls-1" d="M13,38H53a2,2,0,0,0,1.93-1.47l6-22A2,2,0,0,0,59,12H12.75L12,7.65A2,2,0,0,0,10,6H5a2,2,0,0,0,0,4H8.33l4.28,24A7,7,0,0,0,13,48h1.68a7,7,0,1,0,12.64,0H37.68a7,7,0,1,0,12.64,0H56a2,2,0,0,0,0-4H13a3,3,0,0,1,0-6ZM56.38,16,51.47,34H16.67L13.46,16ZM24,51a3,3,0,1,1-3-3A3,3,0,0,1,24,51Zm23,0a3,3,0,1,1-3-3A3,3,0,0,1,47,51Z"/></svg> Cart <span
                class="badge badge-pill badge-danger">0</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="row total-header-section">
                <div class="col-lg-12 col-sm-12 col-sm-12 total-section">
                    <p>Your cart is empty.</p>
                </div>
            </div>
        </div>
    </div>';

    }

        return $response;

    }

   

    public function getCartId($ip){
        $response=[];
        $data['cart'] = Cart::where('session_id', $ip)->first();
        $cartId='';
        if($data['cart']!=NULL){
            //return existing cart
            $cartId=$data['cart']->id;
        }else{
            //generate and return new cart id
            $cartId=str_replace('.','',$ip);
        }
       
        $response['cartId']=$cartId;
        return $response;

    }

    public function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        return $ipaddress;
     }
	 
	 
	 
    public function insert_cart_session(Request $request){
        $response=[];
        try {
            $session_id=$request->id;
            //check the session id is exist or not
            // DB::enableQueryLog();
            $getSessionData = DB::table('cart_session')
                ->select('*')
                ->where('session_id', $session_id)
                ->get(); // you were missing the get method
            $getSessionData= $getSessionData->toArray();
            if(count($getSessionData)==0){
                $timestart= strtotime(date("Y-m-d H:i:s"));
                $timeend= $timestart+300;
                
                DB::table('cart_session')->insert(
                    ['session_id' => "$session_id", 'timestart' => $timestart, 'timeend'=>$timeend]
                );
                // echo "enter";
                // exit;
                $response['status']=1;
                
                $response['success']=strtotime(date("Y-m-d H:i:s"));
            }else{
                if(strtotime(date("Y-m-d H:i:s")) >= $getSessionData[0]->timeend){
                    \Session::forget('btoken'); 
                    $request->session()->regenerate();
                    $response['status']=3;//for session removed
                    $response['success']='session removed';
                }else{
                    $response['status']=1;
                    $response['success']=strtotime(date("Y-m-d H:i:s"));
                }
            }
        }catch(Exception $e){
            //throw new \App\Exceptions\FrontException($e->getMessage());
            $response['status']=2;
            $response['error']=$e->getMessage();
        }
        return \json_encode($response);
    }
	
	//check timer
	  public function check_timer(Request $request){
        $response=[];
        try {
            $session_id=$request->id;
            //check the session id is exist or not
            // DB::enableQueryLog();
            $getSessionData = DB::table('cart_session')
                ->select('*')
                ->where('session_id', $session_id)
                ->get(); // you were missing the get method
            $getSessionData= $getSessionData->toArray();
            if(count($getSessionData)>0){
                $getTotalTime= $getSessionData[0]->timeend- strtotime(date("Y-m-d H:i:s"));
                if($getTotalTime>0){
                    $getMin= date("i:s",$getTotalTime);
                    // exit;
                }
                else{
                    $getMin= 0;
                    // exit;
                }
                $response['status']=1; 
                $response['success']=$getMin;
                // exit;
            }else{
                $response['status']=3; 
                $response['success']="No Response";
            }
        }catch(Exception $e){
            //throw new \App\Exceptions\FrontException($e->getMessage());
            $response['status']=2;
            $response['error']=$e->getMessage();
        }
        return json_encode($response);
    } 


}