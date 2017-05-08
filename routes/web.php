<?php
use Illuminate\Support\Facades\Auth;

Route::get('/web/dashboard',function(){
    return view('vendor.backpack.base.dashboard');
})->middleware('auth');

Route::get('/',function(){

    return redirect()->to('/login');
});

Auth::routes();

Route::group(['prefix' => 'web','middleware' => 'auth'],function(){

    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('products','ProductController');
    Route::get('/product/shop','ShopController@index')->name('web.product.shop');
    Route::get('/product/cart/{product_id}','ShopController@add')->name('web.product.shop.add');
    Route::get('/product/cart/{product_id}/remove','ShopController@destroy')->name('web.product.shop.delete');
    Route::get('/product/checkout','ShopController@checkout')->name('web.product.shop.checkout');
    Route::post('/product/confirm','ShopController@makePayment')->name('web.product.shop.confirm');

    Route::get('/order/me','UserOrderController@index')->name('web.user_order.index');

    Route::get('/order/{id}/approve','OrderController@approve')->name('web.user_order.approve');
    Route::get('/order/{id}/paid','OrderController@setPaid')->name('web.user_order.paid');

    Route::get('/order/me/{id}/detail','UserOrderController@show')->name('web.user_order.show');
    Route::post('/order/me/{id}/evidence','UserOrderController@uploadEvidence')->name('web.user_order.evidence');


    Route::get('order/all','OrderController@index')->name('web.order.index');

    Route::get('/inventory','InventoryController@index')->name('web.inventory.index');
    Route::post('/inventory','InventoryController@store')->name('web.inventory.store');
    Route::get('/inventory/create','InventoryController@create')->name('web.inventory.create');
    Route::get('/inventory/{id}/delete','InventoryController@destroy')->name('web.inventory.delete');
    Route::get('/inventory/topup/{id}','InventoryController@topupItem')->name('web.inventory.topup');
    Route::put('/inventory/topup/{id}','InventoryController@topupItemUpdate')->name('web.inventory.topup_update');

    Route::resource('/filemanager','FileManagerController');
    Route::get('filemanager/delete/{file_id}','FileManagerController@deleteFile')->name('filemanager.remove');
    Route::get('material-support','FileManagerController@materialSupport')->name('filemanager.material-support');

    Route::get('/roles/discount','DiscountController@index')->name('web.role_discount.index');
    Route::get('/roles/discount/create','DiscountController@create')->name('web.role_discount.create');
    Route::post('/roles/discount/create','DiscountController@store')->name('web.role_discount.store');
    Route::get('/roles/discount/{id}/delete','DiscountController@destroy')->name('web.role_discount.delete');

    Route::get('/payment/{id}/invoice','InvoiceController@generateInvoice')->name('web.payment.invoice');

    Route::get('/settings','ConfigurationController@index')->name('web.setting.index');
    Route::post('/settings','ConfigurationController@store')->name('web.setting.store');


    Route::resource('news','NewsPostController');
    Route::get('/more/{slug?}','NewsPostController@getBySlug')->name('web.news.get_by_slug');



});

