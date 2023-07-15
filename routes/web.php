<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/redirect',[HomeController::class,'redirect']);

// Route::controller(HomeController::class)->group(function(){
//     Route::get('/','Index')->name('home');

//   });


  Route::controller(ClientController::class)->group(function(){

    Route::get('/category/user/{id}/{slug}','CategoryPage')->name('category');
    Route::get('/product-detailw/{id}/{slug}','SinglePage')->name('singleproduct');
    Route::get('/new_relese','NewRelease')->name('newrelease');

});










  Route::middleware('auth')->group(function () {
    Route::controller(ClientController::class)->group(function(){

        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/shiping_addres','Shipping')->name('shipping');
        Route::get('/add-to-cart','Add_To_Cart')->name('addtocart');
        Route::post('/add-to-cart-product','Add_To_Cart_Product')->name('addtocartproduct');
        Route::get('/user-profile','UserProfile')->name('userprofile');

        Route::get('/today_deal','TodayIdea')->name('todayidea');
        Route::get('/customar','Customar')->name('customar');
        Route::post('/add-shipping','AddShipping')->name('addshipping');
        Route::post('/place_order','PlaceOrder')->name('placeorder');



        Route::get('/user_profile/peding-orders','PendingOrders')->name('pendingoders');
        Route::get('/user_profile/history','History')->name('history');

        Route::get('remove/item/{id}','RemoveCart')->name('removeitem');



      });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','verified')->group(function () {
    // Route::controller(DashboardController::class)->group(function(){
    //     Route::get('admin/dashboard','Index')->name('admindashboard');

    // });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/all-category','Index')->name('allcategory');
        Route::get('admin/add-category','AddCategory')->name('addcategory');
        Route::post('admin/store-category','StoreCat')->name('store.category');
        Route::get('admin/editcategory/{id}','EditCategory')->name('editcategory');
        Route::get('admin/deletecategory/{id}','DeleteCategory')->name('deletecategory');
        Route::post('admin/update-category','UpdateCat')->name('update.category');


    });
    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('admin/all-aubcategory','Index')->name('allsubcategory');
        Route::get('admin/add-subcategory','AddSubCategory')->name('addsubcategory');
        Route::post('admin/store-subcategory','StoreSubCat')->name('store.subcat');
        Route::get('admin/editsubcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::get('admin/deletesubcategory/{id}','DeleteSubCategory')->name('deletesubcategory');
        Route::post('admin/update-subcategory','UpdateSubCat')->name('update.subcategory');


    });


    Route::controller(ProductController::class)->group(function(){
        Route::get('admin/all-product','Index')->name('allproduct');
        Route::get('admin/add-product','AddProduct')->name('addproduct');
        Route::post('admin/store-product','StoreProduct')->name('store.product');
        Route::get('admin/editproduct/{id}','EditProduct')->name('editproduct');
        Route::get('admin/deleteproduct/{id}','DeleteProduct')->name('deleteproduct');
        Route::post('admin/update-product','UpdateProduct')->name('update.product');
        Route::get('admin/editproductimg/{id}','EditProductImg')->name('editproductimg');
        Route::post('admin/update-img','UpdateProductImage')->name('update.productimg');


    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('admin/pending','Pending')->name('pending');
        Route::get('admin/complete','Completed')->name('completed');
        Route::get('admin/cancalled','Cancalled')->name('cancalled');
    });
});

require __DIR__.'/auth.php';
