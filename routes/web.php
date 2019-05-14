<?php

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

Route::get('/','frontend@index');

Auth::routes();

Route::get('/test',function(){return view('pages.frontend-shop.list-products');})->name('Test');
Route::post('/loginPizzaHouse','frontend@loginPizzaHouse');
Route::post('/registerUser','frontend@registerPizzaHouse');
Route::get('/registerUser',function(){
    return view('auth.register');
});
Route::get('/logoutPizzaHouse/{id}',function($id){

    $get = Session::get('pizzaHouseAccount');
    if($get['ID']==$id)
        Session::forget('pizzaHouseAccount');


    Session::forget('pizzaHouseCart');
    Session::forget('verify');
    return redirect()->back();
});

Route::get('/product/details/{id}','frontend@getProdDetails');
Route::post('/addToCart','frontend@addToCart');
Route::post('/removeToCart','frontend@removeToCart');
Route::post('/verify','mailer@sendConfirm');
Route::post('/checkVerify','mailer@sendMail');

Route::get('/mail','mailer@sendConfirm');


//getProps

Route::get('/getPizza/info/{id}',function($id){
   $pizzaInfos = ($id==0)?\App\r_pizza_information::with('rPizzaType')->get():\App\r_pizza_information::with('rPizzaType')->where('pt_id',$id)->get();
    foreach($pizzaInfos as $pizzaInfo){
        $pizzaInfo->pi_img = asset("uploads/".$pizzaInfo->pi_img);

   }

   return $pizzaInfos;

});


Route::group(['middleware' => ['authenticate']], function() {
    //Admin
    Route::get('/dashboard', 'adminController@getDashboard')->name('Dashboard');
    Route::get('/salesJSON',function(){
        $salesJSON = array();
        $sales = collect(DB::SELECT("
        SELECT  
        SUM(o_totalAmount) GROSS_SALES  
        ,date(created_at) created_at
        FROM t_orders 
        WHERE !isnull(o_paid_at) 
		GROUP BY date(created_at) "));


        foreach($sales as $item){
            $sales = array(strtotime($item->created_at)*1000,$item->GROSS_SALES);
            array_push($salesJSON,$sales);
        }
        return $salesJSON;
    });
    Route::get('/sales','sales@index');
});



