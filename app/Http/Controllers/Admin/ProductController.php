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
use App\Models\Pcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Action;
use App\Models\Role;
use App\Models\AdminPermission;
use App\DataTables\ProductDataTable;
use App\Helpers\AdminHelper;

class ProductController extends Controller
{
    //=================================================================

	public function index(Request $request)
	{
		//return $dataTable->render('admin/products/index');
        
        $data = [];
		//==============================================
		$status_action = Action::where('action_slug','status')->first();
        $data['checkStatusAction'] = Role::where('name_slug','products')->whereRaw("find_in_set('".$status_action->id."',action_id)")->first();
        $data['roles'] = Role::where('name_slug','products')->first();
        $data['checkStatusPermission'] = AdminPermission::where('user_id',Auth::user()->id)->whereRaw("find_in_set('status',action_id)")->first();
        $data['action_ids'] = explode(',', $data['roles']->action_id);
        //==============================================

		$data['pcategories'] = Pcategory::get();

		
		$data['brands'] = Brand::get();

        
		if (!empty($request->category_id) || !empty($request->brand_id) || !empty($request->status) || !empty($request->title)) {
               
            
               
			$query = Product::select('*');

			if (!empty($request->category_id)) {


				$query = $query->where('category_id',$request->category_id);
				$data['category_id'] = $request->category_id;
			}else{
				$data['category_id'] = '';
			}
			if (!empty($request->brand_id)) {
				$query = $query->where('brand_id',$request->brand_id);
				$data['brand_id'] = $request->brand_id;
			}else{
				$data['brand_id'] = '';
			}
			if (!empty($request->title)) {
				$query = $query->where('title','LIKE','%'.$request->title.'%');
				$data['title'] = $request->title;
			}else{
				$data['title'] = '';
			}
		}else{
			$query = Product::select('*');
		}

        $data['results'] = $query->orderBy('order_no')->orderBy('title')->get();

		return view('admin/products/index',$data);


	}

	//=================================================================

	public function add()
	{
		$data = array();
		$data['brands'] = Brand::where('status','1')->get();
		$data['pcategories'] = Pcategory::where('status','1')->get();

		return view('admin/products/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{

		try {
			
			$validator = Validator::make($request->all(), [
				'brand_id' => 'required',
				'title' => 'required',
				'image' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/products/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $data = new Product;
		        $maxOrder = Product::max('order_no');
		        //=========================================================
				if(!empty($request->vat)){
						$vat = $request->vat;
					}
					else{
						$vat = 0;
					}
		        if (!empty($request->variants) && $request->variants == '1') {
					
		        	$variants = '1';
		        	$prices=$request->prices;
                    foreach($prices as $vp){

                    	$vatpp = $vp * $vat/100;
                        $vatp[]=$vatpp + $vp;

                    }

		        	$sizes =  implode(',', $request->sizes);
		        	$colors = implode(',', $request->colors);
		        	$prices = implode(',', $vatp);
		        	$price =  '';

		        }else{
					
		        	$variants = '0';
		        	$sizes = '';
		        	$colors = '';
		        	$prices = '';
		        	$vatpp = $request->price * $vat/100;
		        	$price = $vatpp + $request->price;
		        }
		        //=========================================================
		        $data->brand_id = $request->brand_id;
		        $data->category_id = $request->category_id;
		       	$data->title = $request->title;

		       	$slug_name = Str::slug($request->title, '-');
		       	$data->title_slug = $slug_name;

		        $data->description = $request->description;
		        $data->variants = $variants;
		        $data->sizes = $sizes;
		        $data->colors = $colors;
		        $data->prices = $prices;
		        $data->price = $price;
		        $data->vat = $vat;
		        $data->image = $imagename;
		        $data->order_no = $maxOrder + 1;
		        $data->save();

		        //=========================================================
		        $images = $request->file('image');
		        foreach ($images as $key => $image) {
					$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/products/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/products/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/products/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/products/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

        			$productImages = new ProductImage;
        			$productImages->product_id = $data->id;
        			$productImages->image = $imagename;
        			$productImages->save();
		        }
		        //=========================================================

				session()->flash('message', 'Product added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/products/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
			//dd($e);
	        session()->flash('message', 'Some error occured during save Product');
            Session::flash('alert-type', 'error');
           	return redirect('admin/products/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Product::find($id);
		$data['sizes'] = explode(',', $data['result']->sizes);
		$data['colors'] = explode(',', $data['result']->colors);
		$data['prices'] = explode(',', $data['result']->prices);
		$data['images'] = ProductImage::where('product_id',$id)->get();
		$data['brands'] = Brand::where('status','1')->get();

		return view('admin/products/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'brand_id' => 'required',
				'title' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/products/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $data = Product::find($request->id);
		        //=========================================================
		        if (!empty($request->variants) && $request->variants == '1') {
		        	$variants = '1';
		        	if (!empty($request->sizes) && !empty($request->colors) && !empty($request->prices)) {
		        		$prices = $request->prices;
                         foreach($prices as $vp){

                    	$vatpp = $vp * $request->vat/100;
                        $vatp[]=$vatpp+$vp; 
                          }
		        		

                        
		        		$sizes = implode(',', $request->sizes);
			        	$colors = implode(',', $request->colors);
			        	$prices = implode(',', $vatp);
		        	}
		        	$price = '';
		        }else{
		        	$variants = '0';
		        	$sizes = '';
		        	$colors = '';
		        	$prices = '';
		        	$vatpp= $request->price * $request->vat/100;
		        	$price = $vatpp+$request->price;
		        }
		        //=========================================================
		        $data->brand_id = $request->brand_id;
		        $data->category_id = $request->category_id;
		       	$data->title = $request->title;

		       	$slug_name = Str::slug($request->title, '-');
		       	$data->title_slug = $slug_name;

		        $data->description = $request->description;
		        $data->variants = $variants;
		        $data->sizes = $sizes;
		        $data->colors = $colors;
		        $data->prices = $prices;
		        $data->price = $price;
		        $data->vat = $request->vat;
		        $data->image = $imagename;
		        $data->save();

		        //=========================================================
		        $images = $request->file('image');
		        foreach ($images as $key => $image) {
					$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/products/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/products/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/products/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/products/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

        			$productImages = new ProductImage;
        			$productImages->product_id = $data->id;
        			$productImages->image = $imagename;
        			$productImages->save();
		        }
		        //=========================================================

				session()->flash('message', 'Product updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/products/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update Product');
            Session::flash('alert-type', 'error');
           	return redirect('admin/products/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id)
	{	
		try {
			$data = Product::find($id);

			$images = ProductImage::where('product_id',$id)->get();

			foreach ($images as $key => $image) {
				$file1 = public_path().'/admin/clip-one/assets/products/original/'.$image->image;
				$file2 = public_path().'/admin/clip-one/assets/products/thumbnail/'.$image->image;
				File::delete($file1,$file2);
			}

			Product::where('id',$id)->delete();
		
			session()->flash('message', 'Product deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/products/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/products/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Product::find($id);
			
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
			
		
			session()->flash('message', 'Product status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/products/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/products/index');
        }
    }

    //===================================================

    public function imageDelete($id){
		
		try {
			$data = ProductImage::find($id);

			$file1 = public_path().'/admin/clip-one/assets/products/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/products/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = ProductImage::where('id',$id)->delete();
		
			return response()->json(['msg'=>'success']);
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    return response()->json(['msg'=>'error']);
        }
    }


    public function getCategory(Request $request)
	{
		$brand_id = $request->brand_id;

		$categories = Pcategory::where('brand_id',$brand_id)->where('status','1')->get();


		if (count($categories)>0) {
			foreach ($categories as $key => $value) {
				$data[] = '<option value="'.$value->id.'">'.$value->title.'</option>';
			}
		}else{
			$data = [];
		}

		return response()->json([
			'status' => 'success',
			'data' => $data,
		]);
	}

	//=================================================================

	public function import()
	{
		$data = array();
		return view('admin/products/import',$data);
	}

	//=================================================================

	public function importProductCsv(Request $request)
	{

		if(!empty($request->file('csv'))){
          	$arr_image = $request->file('csv');
          	$arr_extension = $arr_image->getClientOriginalExtension();
          	$arr_image_name = $arr_image->getClientOriginalName();
          	$arr_img_name = str_replace(' ', '_', strtolower($arr_image_name));
          	$input['csv'] = time().'_'.$arr_img_name;
          	$arr_path = base_path().'/public/admin/clip-one/assets/products/csv/';
          	$arr_image->move($arr_path, $input['csv']);
        }

      	$file = base_path().'/public/admin/clip-one/assets/products/csv/'.$input['csv'];
      
      	$productArr = AdminHelper::csvToArray($file);
      	
      	$tableHeader = array(
        	'Brand Name'=>'Brand Name',
        	'Category Name'=>'Category Name',
        	'Category Image'=>'Category Image',
        	'Brand Image'=>'Brand Image',
        	'Product Name'=>'Product Name',
        	'Description'=>'Description',
	        'Price'=>'Price',
	        'Image'=>'Image',
	        'VAT'=>'VAT',
	        'Variants'=>'Variants',
	        'Sizes'=>'Sizes',
	        'Colors'=>'Colors',
	        'Prices'=>'Prices',
	        'Weight'=>'Weight',
	        
      	);
      	
      	for ($i = 0; $i < count($productArr); $i ++){
	        if (array_diff_key($tableHeader,$productArr[$i])) {
	          	$msg_error="Wrong format, Please check sample format first!";
	      		 session()->flash('message', $msg_error);
			        Session::flash('alert-type','error'); 
			 return redirect('admin/products/index');
	        }else{
	          
               $brand_id = $this->checkBrand($productArr[$i]['Brand Name'],$productArr[$i]['Brand Image']);
	            $category_id = $this->checkCategory($productArr[$i]['Category Name'],$productArr[$i]['Category Image'],$brand_id);
	            $title = $productArr[$i]['Product Name'];
	            $title_slug = Str::slug($productArr[$i]['Product Name'], '-');
	            $description = $productArr[$i]['Description'];
	            $price = $productArr[$i]['Price'];
	            
	            $status = '1';
	            $vat = $productArr[$i]['VAT'];

	            $variants = $productArr[$i]['Variants'];

	            $sizes = $productArr[$i]['Sizes'];

	            $colors = $productArr[$i]['Colors'];

	            $prices = $productArr[$i]['Prices'];

	            $weight = $productArr[$i]['Weight'];

	            $image = $productArr[$i]['Image'];
                


                //product save//

                 $data = new Product;
		        $maxOrder = Product::max('order_no');
		        //=========================================================
		        if ( $variants == '1') {
		        	$variants = '1';
		        	$sizes =  $sizes;
		        	$colors = $colors;
		        	$prices = $prices;
		        	$price = '';
		        }else{
		        	$variants = '0';
		        	$sizes = '';
		        	$colors = '';
		        	$prices = '';
		        	$price = $price;
		        }
		        //=========================================================
		        $data->brand_id = $brand_id;
		        $data->category_id = $category_id;
		       	$data->title = $title;

		       	
		       	$data->title_slug = $title_slug;

		        $data->description = $description;
		        $data->variants = $variants;
		        $data->sizes = $sizes;
		        $data->colors = $colors;
		        $data->prices = $prices;
		        $data->price = $price;
		        $data->weight = $weight;
		        $data->vat = $vat;
		        $data->image = '';
		        $data->order_no = $maxOrder + 1;
		        $data->save();
                 
                
                $images=explode(',',$image);

                foreach($images as $img){
                 $productImages = new ProductImage;
        		 $productImages->product_id = $data->id;
        		 $productImages->image = $img;
        		 $productImages->save();
	
                }

                



                //end product save








	            
	            

 
	        }
      	}
      	

      	if ($data) {
        	session()->flash('message', 'Product data imported successfully');
			Session::flash('alert-type', 'success'); 
			return redirect('admin/products/index');
      	}else{
	      	session()->flash('message', 'Error');
			Session::flash('alert-type', 'error'); 
			return redirect('admin/products/index');
      	}
	}

	public function checkBrand($brand_name,$brand_image)
	{
		$checkBrand = Brand::where('name','LIKE','%'.$brand_name.'%')->first();

		if (!empty($checkBrand)) {
			$brand_id = $checkBrand->id;
		}else{
			$brand = new Brand;
			$brand->name = $brand_name;
			$brand->brand_slug = Str::slug($brand_name, '-');
			$brand->image = $brand_image;
			$brand->status = '1';
			$brand->save();

			$brand_id = $brand->id;
		}

		return $brand_id;
	}
   
    public function checkCategory($category_name,$category_image,$brand_id)
	{
		$checkCategory = Category::where('title','LIKE','%'.$category_name.'%')->first();

		if (!empty($checkCategory)) {
			$category_id = $checkCategory->id;
		}else{
			$category = new Category;
			$category->brand_id = $brand_id;
			$category->title = $category_name;
			
			$category->image = $category_image;
			$category->status = '1';
			$category->save();

			$category_id = $category->id;
		}

		return $category_id;
	}

	



	  public function sortProducts(Request $request)
  	{
  		
  		$tasks = Product::all();
  		
  	
        foreach ($tasks as $task) {
            $id = $task->id;
          
            foreach ($request->order as $order) {
                  
                if ($order['id'] == $id) {
                    
                  $task->order_no = $order['position'];
                  $task->save();
                 // $task->update(['order_no' => $order['position']]);
                }
            }
        }
        return response()->json(['status'=>'success']);
  	}

}
