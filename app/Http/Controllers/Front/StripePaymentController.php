<?php
   
namespace App\Http\Controllers\Front;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Order;
use App\Models\Items;
use App\Models\Setting;
use App\Models\Cms;
use App\Models\Product;
use Redirect;
use Session;
use URL;
use Stripe;
use Stripe\Customer;
use Mail;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    public function test(Request $request)
    {
        
        $cart = session()->get('cart');

        //dd($cart);
    }


    public function makePayment(Request $request)
    {
        
        //dd(\Session::all());
        $collect = $request->collect;
        if(session()->has('cart')){
        $data = array();
        $collect = $request->collect;
        $cart = session()->get('cart');
        //dd($cart);
        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];
        }

        if($total < "375"){

            $vat = 10;

        } else {

            $vat = 0;


        }

        $data['collect'] = $collect;

        $data['vat'] = $vat;
        $data['subtotal'] = $total + $vat;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $paymentIntents = Stripe\PaymentIntent::create([
            'amount' => $data['subtotal']* 100,
            'currency' => 'EUR',
            'payment_method_types' => [
                'card',
            ]
        ]);
        $data['client_secret'] = $paymentIntents->client_secret;

        //echo  $total; die;
        return view('front/stripe',$data);
        } else {

             echo 'No data in the session';
        }
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // echo 'ajay';die;
       // echo '<pre>';print_r($_POST);die;
        //============get form details
        $this->regis['first_name'] = $request->first_name;
        $this->regis['last_name'] = $request->last_name;
        $this->regis['email'] = $request->email;
        $this->regis['phone'] = $request->phone;
        $this->regis['country'] = $request->country;
        $this->regis['city'] = $request->city;
        $this->regis['address'] = $request->address;
        $this->regis['collect'] = $request->collect;
         \Session::put('list', $this->regis); 

        $cart = session()->get('cart');

        //===================================
        //dd($cart);
        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];

            $itemName .= $item['title'].',';
           
        }

        $collect = $request->collect;
        if($collect == 1){

            $vat = 0;

        } else {

            $vat = config('constants.vat');


        }

        $subtotal = $total + $vat;

        //echo  $subtotal; die;
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        
       /* $customer = Customer::create(array(
            'email' => $request->email,
            'source'  => $request->stripeToken
        ));*/
        
        //dd($customer);

         // Unique order ID 
        $orderID = strtoupper(str_replace('.','',uniqid('', true))); 

        //=======================================
        // $charge = Stripe\Charge::create ([
        //         'customer' => $customer->id,
        //         "amount" => $subtotal * 100,
        //         "currency" => "EUR",
        //         "source" => $request->stripeToken,
        //         "description" => $itemName,
        //         'metadata' => array( 
        //             'order_id' => $orderID,
        //             'email' => $request->email,
        //             'address' => $request->address,
        //             'phone' => $request->phone,
        //             'name' => $request->first_name . $request->last_name,
        //         )
                

        // ]);

        // Retrieve charge details 
        // $chargeJson = $charge->jsonSerialize();

        //dd($chargeJson);

        //================================

        // Check whether the charge is successful 
        // if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){

        // Order details  
       // $transactionID = $request->stripeToken; 
       $transactionID = $request->_token; 

        $paidAmount = $subtotal * 100; 
        $paidCurrency = 'EUR'; 
        $payment_status = 'succeeded';

        //=============================
        // if($charge['status'] == 'succeeded') {

        //echo $charge['id'];
         //echo "<pre>";
         //print_r($charge);exit();

         // insert in order db
            $order = new \App\Models\Order;
            $value = session()->get('list');
            //=========================================================
            $order->billing_first_name = $value['first_name'];
            $order->billing_last_name = $value['last_name'];
            $order->billing_email = $value['email'];
            $order->billing_phone = $value['phone'];
            $order->billing_country = $value['country'];
            $order->billing_city = $value['city'];
            $order->billing_address = $value['address'];
            $order->order_status = 1;
            $order->charge_id = $transactionID;
            $order->amount = $paidAmount;
            //$order->payment_status = 'Processing';
            $order->payment_status = 'Succeeded';
            $order->transaction_id = $transactionID;
            $order->order_id = $orderID; 
            //$order->payment_response = $payment_response;
            $order->collect = $value['collect'];
            $order->created_at = date('Y-m-d H:i:s');
            $order->updated_at = date('Y-m-d H:i:s');
            $order->save();

            // insert in item db
            $order_id = $order->id;

            foreach ($cart as $item) {
                $items = new \App\Models\Items;
                
                $items->order_id = $order_id;
                $items->item_name = $item['title'];
                $items->item_price = $item['price'];
                $items->quantity = $item['quantity'];
                //dd($items);
                $items->save();
            }
            
            // mail send code start
             
            $value = session()->get('list');
            $cart = session()->get('cart');
            // order details
            $orderDetail = Order::where('id',$order_id)->first();
            //echo $value['email']; die;
            $data = array(
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'email' => $value['email'],
                'phone' =>  $value['phone'],
                'city' =>  $value['city'],
                'address' =>  $value['address'],
                'collect' =>  $value['collect'],
                'cart' =>  $cart,
                'orderDetail' =>  $orderDetail,
                'title' => 'outdoorstructuresireland::Payment'
            );

            Mail::send('front.emails.emailPaypal', $data, function ($message) use ($data) {
                $message->from('info@outdoorstructuresireland.com', 'outdoor Payment');
            
                $message->to($data['email'])->cc('info@outdoorstructuresireland.com')->subject('Outdoor::Payment!');
            });


            Session::flush();
            \Session::put('success', 'Payment success');
        

            return redirect('/payment/thankyou');
        
        //  } 

        // } else {


        //     Session::flash('error', 'Payment error!');
        //  }
  
        
          
        return back();
    }

    //=========================================

    

    
}