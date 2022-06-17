<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Cookie;
use Illuminate\Http\Request;
use Validator;
use Input;
use App\Models\User;
use App\Models\Order;
use App\Models\Items;
use Session;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Log;
use Exception;

class OrderController extends Controller
{
    //=================================================================

	public function index()
	{  
		
		$order_data = array();
		$orderDetails = Order::all();
		//dd($orderDetails);
		$order_data['orderDetails'] = $orderDetails;
		
		return view('admin/order/index',$order_data);
	}

	//=================================================================

	
	//=================================================================
	
	
	//===========================================================================
	public function edit(Request $request,$id)
	{

		$order_id = $id;
		$orderDetail = Order::where('id',$order_id)->first();

		
		return view('admin/order/edit')->with(compact('orderDetail'));

	}

	//===========================================================================
	public function update(Request $request) {
		try {
				
				$order_id = $request->order_id;
				
				$validator = Validator::make($request->all(), [
						'order_status' => 'required'
					]);					


				if ($validator->fails()) { 
						//echo 'fails'; die;
						return redirect('admin/order/edit/'.''.$order_id)
						->withErrors($validator)
						->withInput();
				} else {

		        $data= array(
							'order_status' => $request->order_status,
						);

		       
		        Order::where('id', $order_id)->update($data);
		        session()->flash('message', 'Order status updated successfully');
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/order/index');
				}

			} catch (\Exception $e) {
	            Log::error($e->getMessage());
			    session()->flash('message', 'Some error occured during update Order status');
	            Session::flash('alert-class', 'alert-danger');
	           return redirect('admin/order/edit'.'/'.$order_id);
	        }
	}

	//===================================================================

	

	//=================================================================
	public function view(Request $request,$id)
	{

		
		$order_data = array();
		$order_id = $id;
		$orderDetails = Order::where('id',$order_id)->first();
		$itemsDetail = Items::where('order_id',$order_id)->get();

		$billamout = $orderDetails->amount / 100 ;

		/*$orderDetail = DB::table('orders')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->select('orders.*', 'items.item_name','items.item_price','items.quantity')
            ->where('orders.id',$order_id)
            ->get();
		*/

         //dd($itemsDetail);

        $order_data['itemsDetail'] = $itemsDetail;
        $order_data['orderDetails'] = $orderDetails;
        $order_data['billamout'] = $billamout;
		
		return view('admin/order/view',$order_data);
		

	}
	//================================================================
	
	//===============================================================



}
