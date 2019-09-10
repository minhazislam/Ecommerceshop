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
//Frontent site

Route::get('/', 'homecontroller@index');


// show category wise products here
Route::get('/products_by_category/{category_id}', 'homecontroller@show_products_by_category');
Route::get('/products_by_manufacture/{manufacture_id}', 'homecontroller@show_products_by_manufacture');
Route::get('/view_products/{products_id}', 'homecontroller@products_by_details_id');


//cart route
Route::post('/add-to-cart', 'cartcontroller@add_to_cart');
Route::get('/show-cart', 'cartcontroller@show_cart');
Route::get('/delete-to-cart/{rowId}', 'cartcontroller@delete_to_cart');
Route::post('/update-cart', 'cartcontroller@update_cart');




//chacek out
Route::get('/login-check', 'checkoutcontroller@login_check');
Route::post('/customer_registration', 'checkoutcontroller@customer_registration');
Route::get('/checkout', 'checkoutcontroller@checkout');
Route::post('/save-shipping-details', 'checkoutcontroller@save_shipping_details');
// customer logout 
Route::post('/customer_login', 'checkoutcontroller@customer_login');
Route::get('/customer_logout', 'checkoutcontroller@customer_logout');
Route::get('/payment', 'checkoutcontroller@payment');
Route::post('/oder-plaes', 'checkoutcontroller@oder_plaes');
Route::get('/manage-order', 'checkoutcontroller@manage_order');
Route::get('/view-order/{order_id}', 'checkoutcontroller@view_order');







//backend route....................
Route::get('/logout', 'superadmincontroller@logout');
Route::get('/admin', 'admincontroller@index');

Route::get('/dashboard', 'superadmincontroller@index');

Route::post('/admin-dashboard', 'admincontroller@deshboard');

// catagory related route


Route::get('/add-category', 'categoryadmincontroller@myadd');
Route::get('/all-category', 'categoryadmincontroller@all_category');
Route::post('/save-category', 'categoryadmincontroller@save_category');

Route::get('/fulfill-category/{category_id}', 'categoryadmincontroller@fulfill_category');

Route::post('/update-category/{category_id}', 'categoryadmincontroller@update_category');
Route::get('/delete-category/{category_id}', 'categoryadmincontroller@delete_category');



Route::get('/unactive_category/{category_id}', 'categoryadmincontroller@unactive_category');
Route::get('/active_category/{category_id}', 'categoryadmincontroller@active_category');

//manufacture or brands route 
Route::get('/add-manufacture', 'manufacturecontroller@index');
Route::post('/save-manufacture', 'manufacturecontroller@save_manufacture');
Route::get('/all-manufacture', 'manufacturecontroller@all_manufacture');
Route::get('/delete-manufacture/{manufacture_id}', 'manufacturecontroller@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}', 'manufacturecontroller@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}', 'manufacturecontroller@active_manufacture');
Route::get('/fulfill-manufacture/{manufacture_id}', 'manufacturecontroller@fulfill_manufacture');
Route::post('/update-manufacture/{manufacture_id}', 'manufacturecontroller@update_manufacture');


//products or brands route 

Route::get('/add-products', 'productscontroller@index');
Route::post('/save-products', 'productscontroller@save_products');
Route::get('/all-products', 'productscontroller@all_products');
Route::get('/unactive_products/{products_id}', 'productscontroller@unactive_products');
Route::get('/active_products/{products_id}', 'productscontroller@active_products');
Route::get('/delete-products/{products_id}', 'productscontroller@delete_products');
Route::get('/fulfill-products/{products_id}', 'productscontroller@fulfill_products');



// slider route are here

Route::get('/add-slider', 'slidercontroller@index');
Route::post('/save-slider', 'slidercontroller@save_slider');
Route::get('/all-slider', 'slidercontroller@all_slider');
Route::get('/unactive-slider/{slider_id}', 'slidercontroller@unactive_slider');
Route::get('/active-slider/{slider_id}', 'slidercontroller@active_slider');
Route::get('/delete-slider/{slider_id}', 'slidercontroller@delete_slider');
 
