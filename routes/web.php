<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

//Auth::routes();

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/admin', array('as'=>'admin.login','uses' => 'Admin\LoginController@index'));
Route::POST('/admin/dologin', 'Admin\LoginController@postLogin');

Route::group(['prefix'=> 'admin','middleware' => ['auth']] , function(){
	Route::get('dashboard', ['as'=>'admin.dashboard', 'uses'=>'Admin\DashboardController@index']);
	Route::get('/logout', ['as'=>'admin.logout', 'uses'=>'Admin\LoginController@getLogout']);
});

Route::group(['prefix'=> 'admin','middleware' => ['auth','UserRole']] , function(){
	Route::get('setting/index', ['as'=>'setting.index', 'uses'=>'Admin\SettingController@index']);
    Route::POST('setting/update', ['as'=>'setting.update', 'uses'=>'Admin\SettingController@update']);

	/*actions Start*/
	Route::get('actions/index',['as'=>'actions.index','uses'=>'Admin\ModulesController@index']);
	Route::get('actions/add',['as'=>'actions.add','uses'=>'Admin\ModulesController@actionsAdd']);
	Route::POST('actions/save',['as'=>'actions.save','uses'=>'Admin\ModulesController@actionsSave']);
	Route::get('actions/edit/{id}',['as'=>'actions.edit','uses'=>'Admin\ModulesController@edit']);
	Route::POST('actions/update',['as'=>'actions.update','uses'=>'Admin\ModulesController@update']);
	Route::get('actions/delete/{id}',['as'=>'actions.delete','uses'=>'Admin\ModulesController@delete']);
	/*actions End*/

	/*Section Start*/
	Route::get('sections/index',['as'=>'sections.index','uses'=>'Admin\ModulesController@sectionsList']);
	Route::get('sections/add',['as'=>'sections.add','uses'=>'Admin\ModulesController@sectionsAdd']);
	Route::POST('sections/save',['as'=>'sections.save','uses'=>'Admin\ModulesController@sectionsSave']);
	Route::get('sections/edit/{id}',['as'=>'sections.edit','uses'=>'Admin\ModulesController@sectionsEdit']);
	Route::POST('sections/update',['as'=>'sections.update','uses'=>'Admin\ModulesController@sectionsUpdate']);
	Route::get('sections/delete/{id}',['as'=>'sections.delete','uses'=>'Admin\ModulesController@sectionsDelete']);
	/*Section End*/

	/*Roles Start*/
	Route::get('roles/index',['as'=>'roles.index','uses'=>'Admin\ModulesController@rolesList']);
	Route::get('roles/add',['as'=>'roles.add','uses'=>'Admin\ModulesController@rolesAdd']);
	Route::POST('roles/save',['as'=>'roles.save','uses'=>'Admin\ModulesController@rolesSave']);
	Route::get('roles/edit/{id}',['as'=>'roles.edit','uses'=>'Admin\ModulesController@rolesEdit']);
	Route::POST('roles/update',['as'=>'roles.update','uses'=>'Admin\ModulesController@rolesUpdate']);
	Route::get('roles/delete/{id}',['as'=>'roles.delete','uses'=>'Admin\ModulesController@rolesDelete']);
	/*Roles End*/

    /// Banners ////
    Route::get('banners/index', ['as'=>'banners.index',  'uses'=>'Admin\BannerController@index']);
    Route::get('banners/add', ['as'=>'banners.add',  'uses'=>'Admin\BannerController@add']);
    Route::POST('banners/save', ['as'=>'banners.save',  'uses'=>'Admin\BannerController@save']);
    Route::get('banners/edit/{id}', ['as'=>'banners.edit', 'uses'=>'Admin\BannerController@edit']);
    Route::POST('banners/update', ['as'=>'banners.update', 'uses'=>'Admin\BannerController@update']);
    Route::get('banners/delete/{id}', ['as'=>'banners.delete', 'uses'=>'Admin\BannerController@delete']);
    Route::get('banners/status/{id}', ['as'=>'banners.status', 'uses'=>'Admin\BannerController@status']);

    /// Pages ////
    Route::get('pages/index', ['as'=>'pages.index',  'uses'=>'Admin\PageController@index']);
    Route::get('pages/add', ['as'=>'pages.add',  'uses'=>'Admin\PageController@add']);
    Route::POST('pages/save', ['as'=>'pages.save',  'uses'=>'Admin\PageController@save']);
    Route::get('pages/edit/{id}', ['as'=>'pages.edit', 'uses'=>'Admin\PageController@edit']);
    Route::POST('pages/update', ['as'=>'pages.update', 'uses'=>'Admin\PageController@update']);
    Route::get('pages/delete/{id}', ['as'=>'pages.delete', 'uses'=>'Admin\PageController@delete']);
    Route::get('pages/status/{id}', ['as'=>'pages.status', 'uses'=>'Admin\PageController@status']);
    Route::get('pages/image/delete/{id}', ['as'=>'pages.images.delete', 'uses'=>'Admin\PageController@imageDelete']);

    /// Gallery ////
    Route::get('gallery/index', ['as'=>'gallery.index',  'uses'=>'Admin\GalleryController@index']);
    Route::get('gallery/add', ['as'=>'gallery.add',  'uses'=>'Admin\GalleryController@add']);
    Route::POST('gallery/save', ['as'=>'gallery.save',  'uses'=>'Admin\GalleryController@save']);
    Route::get('gallery/edit/{id}', ['as'=>'gallery.edit', 'uses'=>'Admin\GalleryController@edit']);
    Route::POST('gallery/update', ['as'=>'gallery.update', 'uses'=>'Admin\GalleryController@update']);
    Route::get('gallery/delete/{id}', ['as'=>'gallery.delete', 'uses'=>'Admin\GalleryController@delete']);
    Route::get('gallery/status/{id}', ['as'=>'gallery.status', 'uses'=>'Admin\GalleryController@status']);
    
    /// Testimonials ////
    Route::get('testimonials/index', ['as'=>'testimonials.index',  'uses'=>'Admin\TestimonialController@index']);
    Route::get('testimonials/add', ['as'=>'testimonials.add',  'uses'=>'Admin\TestimonialController@add']);
    Route::POST('testimonials/save', ['as'=>'testimonials.save',  'uses'=>'Admin\TestimonialController@save']);
    Route::get('testimonials/edit/{id}', ['as'=>'testimonials.edit', 'uses'=>'Admin\TestimonialController@edit']);
    Route::POST('testimonials/update', ['as'=>'testimonials.update', 'uses'=>'Admin\TestimonialController@update']);
    Route::get('testimonials/delete/{id}', ['as'=>'testimonials.delete', 'uses'=>'Admin\TestimonialController@delete']);
    Route::get('testimonials/status/{id}', ['as'=>'testimonials.status', 'uses'=>'Admin\TestimonialController@status']);

    /// Mailing List ////
    Route::get('mailing_list/index', ['as'=>'mailing_list.index',  'uses'=>'Admin\MailingListController@index']);
    Route::get('mailing_list/add', ['as'=>'mailing_list.add',  'uses'=>'Admin\MailingListController@add']);
    Route::POST('mailing_list/save', ['as'=>'mailing_list.save',  'uses'=>'Admin\MailingListController@save']);
    Route::get('mailing_list/edit/{id}', ['as'=>'mailing_list.edit', 'uses'=>'Admin\MailingListController@edit']);
    Route::POST('mailing_list/update', ['as'=>'mailing_list.update', 'uses'=>'Admin\MailingListController@update']);
    Route::get('mailing_list/delete/{id}', ['as'=>'mailing_list.delete', 'uses'=>'Admin\MailingListController@delete']);
    Route::get('mailing_list/status/{id}', ['as'=>'mailing_list.status', 'uses'=>'Admin\MailingListController@status']);
    Route::POST('mailing_list/send_mail', ['as'=>'mailing_list.send_mail', 'uses'=>'Admin\MailingListController@send_mail']);

    //// Services ////
    Route::get('services/index', ['as'=>'services.index',  'uses'=>'Admin\ServiceController@index']);
    Route::get('services/add', ['as'=>'services.add',  'uses'=>'Admin\ServiceController@add']);
    Route::POST('services/save', ['as'=>'services.save',  'uses'=>'Admin\ServiceController@save']);
    Route::get('services/edit/{id}', ['as'=>'services.edit', 'uses'=>'Admin\ServiceController@edit']);
    Route::POST('services/update', ['as'=>'services.update', 'uses'=>'Admin\ServiceController@update']);
    Route::get('services/delete/{id}', ['as'=>'services.delete', 'uses'=>'Admin\ServiceController@delete']);
    Route::get('services/status/{id}', ['as'=>'services.status', 'uses'=>'Admin\ServiceController@status']);
    Route::get('services/image/delete/{id}', ['as'=>'services.images.delete', 'uses'=>'Admin\ServiceController@imageDelete']);

    /// Categories ////
    Route::get('categories/index', ['as'=>'categories.index',  'uses'=>'Admin\CategoryController@index']);
    Route::get('categories/add', ['as'=>'categories.add',  'uses'=>'Admin\CategoryController@add']);
    Route::POST('categories/save', ['as'=>'categories.save',  'uses'=>'Admin\CategoryController@save']);
    Route::get('categories/edit/{id}', ['as'=>'categories.edit', 'uses'=>'Admin\CategoryController@edit']);
    Route::POST('categories/update', ['as'=>'categories.update', 'uses'=>'Admin\CategoryController@update']);
    Route::get('categories/delete/{id}', ['as'=>'categories.delete', 'uses'=>'Admin\CategoryController@delete']);
    Route::get('categories/status/{id}', ['as'=>'categories.status', 'uses'=>'Admin\CategoryController@status']);
 /// Brands ////
 Route::get('brands/index', ['as'=>'brands.index',  'uses'=>'Admin\BrandController@index']);
 Route::get('brands/add', ['as'=>'brands.add',  'uses'=>'Admin\BrandController@add']);
 Route::POST('brands/save', ['as'=>'brands.save',  'uses'=>'Admin\BrandController@save']);
 Route::get('brands/edit/{id}', ['as'=>'brands.edit', 'uses'=>'Admin\BrandController@edit']);
 Route::POST('brands/update', ['as'=>'brands.update', 'uses'=>'Admin\BrandController@update']);
 Route::get('brands/delete/{id}', ['as'=>'brands.delete', 'uses'=>'Admin\BrandController@delete']);
 Route::get('brands/status/{id}', ['as'=>'brands.status', 'uses'=>'Admin\BrandController@status']);
 /// Product Enquire ////
Route::get('enquires/index', ['as'=>'enquires.index',  'uses'=>'Admin\EnquireController@index']);
Route::get('enquires/view/{id}', ['as'=>'enquires.view', 'uses'=>'Admin\EnquireController@view']);
Route::get('enquires/delete/{id}', ['as'=>'enquires.delete', 'uses'=>'Admin\EnquireController@delete']);
	
	/// Product Categories ////
 Route::get('pcategories/index', ['as'=>'pcategories.index',  'uses'=>'Admin\PcategoryController@index']);
 Route::get('pcategories/add', ['as'=>'pcategories.add',  'uses'=>'Admin\PcategoryController@add']);
 Route::POST('pcategories/save', ['as'=>'pcategories.save',  'uses'=>'Admin\PcategoryController@save']);
 Route::get('pcategories/edit/{id}', ['as'=>'pcategories.edit', 'uses'=>'Admin\PcategoryController@edit']);
 Route::POST('pcategories/update', ['as'=>'pcategories.update', 'uses'=>'Admin\PcategoryController@update']);
 Route::get('pcategories/delete/{id}', ['as'=>'pcategories.delete', 'uses'=>'Admin\PcategoryController@delete']);
 Route::get('pcategories/status/{id}', ['as'=>'pcategories.status', 'uses'=>'Admin\PcategoryController@status']);


 
    /// products ////
    Route::get('products/index', ['as'=>'products.index',  'uses'=>'Admin\ProductController@index']);
    Route::get('products/add', ['as'=>'products.add',  'uses'=>'Admin\ProductController@add']);
    Route::POST('products/save', ['as'=>'products.save',  'uses'=>'Admin\ProductController@save']);
    Route::get('products/edit/{id}', ['as'=>'products.edit', 'uses'=>'Admin\ProductController@edit']);
    Route::POST('products/update', ['as'=>'products.update', 'uses'=>'Admin\ProductController@update']);
    Route::get('products/delete/{id}', ['as'=>'products.delete', 'uses'=>'Admin\ProductController@delete']);
    Route::get('products/status/{id}', ['as'=>'products.status', 'uses'=>'Admin\ProductController@status']);
    Route::get('products/image/delete/{id}', ['as'=>'products.image.delete', 'uses'=>'Admin\ProductController@imageDelete']);
    Route::post('getCategory', ['as'=>'getCategory.delete', 'uses'=>'Admin\ProductController@getCategory']);

    Route::get('products/import', ['as'=>'products.import',  'uses'=>'Admin\ProductController@import']);
    Route::POST('products/import/csv', ['as'=>'products.import.csv',  'uses'=>'Admin\ProductController@importProductCsv']);


    Route::POST('products/sortProducts', ['as'=>'products.sortProducts', 'uses'=>'Admin\ProductController@sortProducts']);
    //// Projects ////
    Route::get('projects/index', ['as'=>'projects.index',  'uses'=>'Admin\ProjectController@index']);
    Route::get('projects/add', ['as'=>'projects.add',  'uses'=>'Admin\ProjectController@add']);
    Route::POST('projects/save', ['as'=>'projects.save',  'uses'=>'Admin\ProjectController@save']);
    Route::get('projects/edit/{id}', ['as'=>'projects.edit', 'uses'=>'Admin\ProjectController@edit']);
    Route::POST('projects/update', ['as'=>'projects.update', 'uses'=>'Admin\ProjectController@update']);
    Route::get('projects/delete/{id}', ['as'=>'projects.delete', 'uses'=>'Admin\ProjectController@delete']);
    Route::get('projects/status/{id}', ['as'=>'projects.status', 'uses'=>'Admin\ProjectController@status']);
    Route::get('projects/image/delete/{id}', ['as'=>'projects.images.delete', 'uses'=>'Admin\ProjectController@imageDelete']);


    //order//

    Route::get('order/index', ['as'=>'order.index', 'uses'=>'Admin\OrderController@index']);
    Route::any('order/view/{id}', ['as'=>'order.view', 'uses'=>'Admin\OrderController@view']);
    Route::any('order/edit/{id}', ['as'=>'order.edit', 'uses'=>'Admin\OrderController@edit']);
    Route::any('order/update', ['as'=>'order.update', 'uses'=>'Admin\OrderController@update']);


	//Route::any('order/edit/{id}', ['as'=>'order.edit', 'middleware' => ['auth'], 'uses'=>'Admin\OrderController@edit']);
	//Route::any('order/update', ['as'=>'order.update', 'middleware' => ['auth'], 'uses'=>'Admin\OrderController@update']);
    //Route::any('order/view/{id}', ['as'=>'order.view', 'middleware' => ['auth'], 'uses'=>'Admin\OrderController@view']);
    //Route::get('order/index', ['as'=>'order.index', 'middleware' => ['auth'], 'uses'=>'Admin\OrderController@index']);
    /// Contacts ////
    Route::get('contacts/index', ['as'=>'contacts.index',  'uses'=>'Admin\ContactController@index']);
    Route::get('contacts/view/{id}', ['as'=>'contacts.view', 'uses'=>'Admin\ContactController@view']);
    Route::get('contacts/delete/{id}', ['as'=>'contacts.delete', 'uses'=>'Admin\ContactController@delete']);


});


//=============================================================================================
/*Front Routes*/


Route::group(['namespace' => 'Front'], function(){

    /*Home*/
    Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
    Route::get('about_us',['as'=>'about_us','uses'=>'CmsController@about_us']);
    Route::get('products',['as'=>'products','uses'=>'CmsController@products']);
    Route::get('services/{id}',['as'=>'services','uses'=>'CmsController@services']);
    Route::get('projects/{id}',['as'=>'projects','uses'=>'CmsController@projects']);
    Route::get('project/details/{id}',['as'=>'projectDetails','uses'=>'CmsController@projectDetails']);
    Route::get('gallery',['as'=>'gallery','uses'=>'CmsController@gallery']);
    Route::get('privacy_policy',['as'=>'privacy_policy','uses'=>'CmsController@privacy_policy']);


    /*Products*/
    Route::get('allcategory/{brand_id?}',['as'=>'allcategory','uses'=>'ProductController@allcategory']);
    Route::get('products',['as'=>'products','uses'=>'ProductController@index']);
    Route::get('products/{cat_id?}',['as'=>'products','uses'=>'ProductController@products']);
    Route::get('product/{id}',['as'=>'productDetails','uses'=>'ProductController@productDetails']);
    Route::patch('product/getPrice', ['as'=>'product.getPrice', 'uses'=>'ProductController@getPrice']);
    Route::get('cart',['as'=>'cart','uses'=>'ProductController@cart']);
    Route::get('add-to-cart/{product}',['as'=>'add-to-cart','uses'=>'ProductController@addToCart']);
    Route::get('remove/{id}',['as'=>'remove','uses'=>'ProductController@removeFromCart']);
    Route::get('change-qty/{product}',['as'=>'change-qty','uses'=>'ProductController@changeQty']);
    Route::get('checkout',['as'=>'checkout','uses'=>'ProductController@checkout']);
   //Route::get('checkout/{id}',['as'=>'checkout','uses'=>'ProductController@checkout']);
	//Add to cart 
	Route::post('/save_cart',    ['as' => 'saveCart',     	'uses' => 'CartController@saveCart']);
	Route::get('/header-cart-reload',    ['as' => 'front_header_cart_reload',     	'uses' => 'CartController@reloadHeaderCart']);
	Route::get('/view-cart',    ['as' => 'front_view_cart',     	'uses' => 'CartController@index']);
	Route::post('/update-cart-item',    ['as' => 'front_update_cart_item',     	'uses' => 'CartController@updateItem']);
	Route::post('/remove-cart-item',    ['as' => 'front_del_cart_item',     	'uses' => 'CartController@removeItem']);

   /*Stripe*/
   Route::post('make/payment', 'StripePaymentController@makePayment');
Route::post('make/paymentpost', 'StripePaymentController@stripePost')->name('payment.post');
   //Route::POST('stripe/post',['as'=>'stripe.post','uses'=>'ProductController@stripePost']);
  // Route::get('thankyou/{id}',['as'=>'thankyou','uses'=>'ProductController@thankyou']);
    /*Products*/
    //Route::get('productsByCategory/{cat_id}/{sub_cat_id?}',['as'=>'productsByCategory','uses'=>'ProductController@productsByCategory']);
    //Route::get('productDetails/{id}',['as'=>'productDetails','uses'=>'ProductController@productDetails']);
    //Route::get('productsFilter',['as'=>'productsFilter','uses'=>'ProductController@productsFilter']);

    Route::get('payment/thankyou/', 'ProductController@thankYou');

    /*Contact Us*/
    Route::get('contact_us',['as'=>'contact_us','uses'=>'ContactController@contact_us']);
    Route::POST('contact/save',['as'=>'contact.save','uses'=>'ContactController@contactSave']);
    Route::get('refresh_captcha', 'ContactController@refreshCaptcha')->name('refresh_captcha');
/*Enquires*/
    Route::get('enquire',['as'=>'enquire','uses'=>'EnquireController@enquire']);
    Route::POST('enquire/save',['as'=>'enquire.save','uses'=>'EnquireController@enquireSave']);
    Route::get('refresh_captcha', 'EnquireController@refreshCaptcha')->name('refresh_captcha');
    /*Mailing List Save*/
    Route::POST('mailing_list/save',['as'=>'mailing_list.save','uses'=>'MailingListController@mailingListSave']);

    Route::get('calculator',['as'=>'calculator','uses'=>'CalculatorController@calculator']);
    Route::POST('calculator/save',['as'=>'calculator.save','uses'=>'CalculatorController@calculatorSave']);
    Route::get('refresh_captcha', 'CalculatorController@refreshCaptcha')->name('refresh_captcha');

    Route::view('sform','front/sform');
    Route::POST('calculator',['as'=>'calculator','uses'=>'CalculatorController@getcalculator']);
});
