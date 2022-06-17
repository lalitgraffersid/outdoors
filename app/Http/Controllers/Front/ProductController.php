<?php
namespace App\Http\Controllers\Front;

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
use Response;
use App\Models\Brand;
use App\Models\Pcategory;
use App\Models\Product;
use App\Models\ProductImage;


class ProductController extends Controller
{
	//=================================================================
    public function index()
    {

        
        $data = array();
			// $data['results'] = Product::where('status','1')->get();
		  $data['results'] = Pcategory::where('status','1')->get();	

        return view('front/products',$data);
        //$products = Product::all();

        //dd($products);
		//return view('front/products');

        //return view('front/products', compact('products'));
    }
	public function allcategory($brand_id='')
	{
		$data = array();
        if(!empty($brand_id)){
        $data['results'] = Pcategory::where('status','1')->where('brand_id',$brand_id)->paginate(6); 
        }else{
        $data['results'] = Pcategory::where('status','1')->paginate(6);	
        } 
		
        
		return view('front/brand/index',$data);
	}

    //=================================================================

	public function products($cat_id='')
	{
		$data = array();
		
		$data['cat_id'] = $cat_id;
		

		if (!empty($cat_id)) {
			$data['results'] = Product::where('category_id',$cat_id)
								->where('status','1')
								->select('id','brand_id','title','title_slug','price','description','image','status','variants','sizes','colors','prices')->orderBy('order_no')->orderBy('title')
            					->paginate(100);
		}else{
			$data['results'] = Product::where('status','1')
								->select('id','brand_id','title','title_slug','price','description','image','status','variants','sizes','colors','prices')->orderBy('order_no')->orderBy('title')
            					->paginate(9);
		}

		return view('front/products/products',$data);
	}

	//=================================================================

	public function productDetails($id)
	{
		$data = array();
		$data['result'] = Product::where('id',$id)->first();
		if (!empty($data['result']->sizes)) {
			$data['sizes'] = explode(',', $data['result']->sizes);
			$data['colors'] = explode(',', $data['result']->colors);
		}else{
			$data['sizes'] = '';
			$data['colors'] = '';
		}
		$data['images'] = ProductImage::where('product_id',$id)->get();
		$data['related_products'] = Product::where('brand_id',$data['result']->brand_id)
											->where('id','!=',$data['result']->id)
											->take(6)
											->get();

                                            
		return view('front/products/productDetails',$data);
	}

	//=================================================================

	public function getPrice(Request $request)
    {
        $product = Product::find($request['id']);
        $sizes = explode(',', $product->sizes);
        $colors = explode(',', $product->colors);
        $prices = explode(',', $product->prices);
        
        $size = $sizes[$request['sizes_key']];
        $color = $colors[$request['sizes_key']];
        $price = $prices[$request['sizes_key']];

        if (!empty($price)) {
            return Response::json([
                'msg'=>'success',
                'size'=>$size,
                'color'=>$color,
                'price'=>$price,
            ]);
        }else{
            return Response::json([
                'msg'=>'error'
            ]);
        }
    }
	public function cart()
    {
        return view('front/products/cart');
    }

	public function addToCart(Product $product)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [$product->id => $this->sessionData($product)];
            return $this->setSessionAndReturnResponse($cart);
        }
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            return $this->setSessionAndReturnResponse($cart);
        }
        $cart[$product->id] = $this->sessionData($product);
        return $this->setSessionAndReturnResponse($cart);

    }
	public function changeQty(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        if ($request->change_to === 'down') {
            if (isset($cart[$product->id])) {
                if ($cart[$product->id]['quantity'] > 1) {
                    $cart[$product->id]['quantity']--;
                    return $this->setSessionAndReturnResponse($cart);
                } else {
                    return $this->removeFromCart($product->id);
                }
            }
        } else {
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
                return $this->setSessionAndReturnResponse($cart);
            }
        }

        return back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', "Removed from Cart");
    }

    protected function sessionData(Product $product)
    {
        return [
            'title' => $product->title,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $productImages->image
        ];
    }

    protected function setSessionAndReturnResponse($cart)
    {
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', "Added to Cart");
    }

    // public function checkout (Request $request){

    //     $page_data = array();
        
        
    //     $cart = session()->get('cart');

    //     $page_data['cart'] = $cart;

    //     $page_data['shipping_cost'] = 1;
    //     $page_data['vat'] = 8;
    //     $page_data['service_tax'] = 1;
    //     $page_data['other_tax'] = 1;

    //     $page_data['total_extra_cost'] = 11;

    //     //dd($cart);
        
    //     return view('front.products.checkout',$page_data);
    
    // }


    
    public function checkout(Request $request)
	{


		$page_data = [];
		$page_data['cart'] = $cart;
        $page_data['shipping_cost'] = 1;
        $page_data['vat'] = 8;
        $page_data['service_tax'] = 1;
        $page_data['other_tax'] = 1;
        $page_data['total_extra_cost'] = 11;
		 if($id==1){
		$page_data['grand_total'] = $page_data['total'];	
		}else{
		$page_data['grand_total'] = $page_data['total'] + $page_data['result']->shipping_price;	
		}

		$page_data['self'] =$id;

		return view('front.products.checkout',$page_data);
	}
	public function thankYou(){      
        
        return view('front.products.thankyou');
        
    }
    


}
