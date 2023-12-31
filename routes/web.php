<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\AddOnController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

//------------------------------------------------------Login and Register Area------------------------------------------------------//
//Login Page
Route::get('/loginpage', [UserController::class, 'loginpage'])->name('loginpage');
//Login Function
Route::post('/loginaccount', [UserController::class, 'userlogin'])->name('userlogin');

//Register Page
Route::get('/registerpage', [UserController::class, 'registerpage']);
//Register Function
Route::post('/registeraccount', [UserController::class, 'userregister'])->name('userregister');

//Display User Dashboard Page
Route::get('/users/dashboard/{id}',[UserController::class,'userdashboard']);

//Logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Home Page
Route::get('/', [UserController::class, 'home'])->name('home');

//------------------------------------------------------Admin Control Area------------------------------------------------------//
//Display Admin Login Page
Route::get('/admin/login', [AdminController::class, 'login'])->middleware('alreadyLoggedIn');

//Login Admin Function
Route::post('/admin/login', [AdminController::class, 'loginAdmin'])->name('login-user');

// Set the middleware in admin panel
Route::middleware(['alreadyLoggedIn', 'isLoggedIn'])->group(function () {

    // --------------------------------------------Admin Dashboard Area -----------------------------------------------------------//
    // Display Admin Dashboard Page
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
    // ------------------------------------------Admin Category Area --------------------------------------------------------------//
    //Admin Store Category
    Route::post('/admin/Category/create', [CategoryController::class, 'AdminstoreCategory']);

    //Admin Show All Category
    Route::get('/admin/Category', [CategoryController::class, 'AdminshowCategory']);

    //Admin Edit Category Function
    Route::get('admin/editCategory/{id}/edit', [CategoryController::class, 'AdminEditCategory'])->name('admin-editCategory');

    //Admin Update Category Function
    Route::put('admin/updateCategory/{id}', [CategoryController::class, 'AdminUpdateCategory'])->name('admin-updateCategory');

    //Admin Delete Category Function
    Route::get('admin/deleteCategory/{id}/delete', [CategoryController::class, 'AdminDeleteCategory'])->name('admin-deleteCategory');

    //Admin View Resort Follow ID Function
    Route::get('/admin/viewCategory/{id}/view',[CategoryController::class,'AdminViewCategory'])->name('admin-viewCategory');

    //MutlipleDelete Category Function
    Route::post('/mutlipledeletecategory/delete', [CategoryController::class, 'AdmindeleteMultipleCategory'])->name('mutlipledeletecategory');

    // Import Product Function
    Route::post('/admin/importCategory',[CategoryController::class,'import'])->name('importCategory');

    //-------------------------------------------------Admin Change Status Area------------------------------------------------------//
    //Change Category Status Function
    Route::get('/changecategory-status/{id}',[CategoryController::class,'changecategoryStatus']);

    //Change Product Status Function
    Route::get('/changeproduct-status/{id}',[ProductController::class,'changeproductStatus']);

    //Change Variant Status Function
    Route::get('/changevariant-status/{id}',[VariantController::class,'changevariantStatus']);

    //Change Add On Status Function
    Route::get('/changeaddon-status/{id}',[AddOnController::class,'changeaddonStatus']);

    // Category Page
    // Route::get('/admin/Category', [CategoryController::class,'index']);

    // Create Category Page
    // Route::get('/admin/Category/create', [CategoryController::class, 'createCategory']);

    // Store Category
    Route::get('/admin/Category/store', [CategoryController::class, 'storeCategory'])->name('storeCategory');
    // Route::get('/admin/Category/store', [CategoryController::class, 'storeCategory'])->name('storeCategory');

    // Product Page
    Route::get('/admin/Product', [ProductController::class, 'index'])->name('product.index');

    // Create Product Page
    Route::get('/admin/Product/Create', [ProductController::class, 'createProduct']);

    // Store Product to the DB
    Route::post('/admin/Product/Store', [ProductController::class,'storeProduct'])->name('storeProduct');

    //Admin Edit Product Function
    Route::get('admin/editProduct/{id}/edit', [ProductController::class, 'EditProduct'])->name('editProduct');

    //Admin Update Product Function
    Route::put('admin/updateProduct/{id}', [ProductController::class, 'UpdateProduct'])->name('updateProduct');

    // view Product to the DB
    Route::post('/admin/Product/{id}/View', [ProductController::class,'viewProduct'])->name('viewProduct');

    // Delete Product Function
    Route::get('admin/deleteProduct/{id}/delete', [ProductController::class, 'DeleteProduct'])->name('deleteProduct');

    //MutlipleDelete Product Function
    Route::post('/mutlipledeleteproduct/delete', [ProductController::class, 'deleteMultipleProduct'])->name('mutlipledeleteproduct');

    // Import Product Function
    Route::post('/admin/importProduct',[ProductController::class,'import'])->name('import');

    // ------------------------------------------Admin Variant Area --------------------------------------------------------------//
    //Admin Store Variant
    Route::post('/admin/Variant/create', [VariantController::class, 'storeVariant']);

    //Admin Show All Variant
    Route::get('/admin/Variant', [VariantController::class, 'showVariant']);

    //Admin Edit Variant Function
    Route::get('admin/editVariant/{id}/edit', [VariantController::class, 'EditVariant'])->name('editVariant');

    //Admin Update Variant Function
    Route::put('admin/updateVariant/{id}', [VariantController::class, 'UpdateVariant'])->name('updateVariant');

    //Admin Delete Variant Function
    Route::get('admin/deleteVariant/{id}/delete', [VariantController::class, 'DeleteVariant'])->name('deleteVariant');

    //MutlipleDelete Variant Function
    Route::post('/mutlipledeletevariant/delete', [VariantController::class, 'deleteMultipleVariant'])->name('mutlipledeletevariant');

    // Import Variant Function
    Route::post('/admin/importVariant', [VariantController::class, 'import']);

    // ------------------------------------------Admin Add On Area --------------------------------------------------------------//
    //Admin Store Add On
    Route::post('/admin/AddOn/create', [AddOnController::class, 'storeAddOn']);

    //Admin Show All Add On
    Route::get('/admin/AddOn', [AddOnController::class, 'showAddOn']);

    //Admin Edit Add On Function
    Route::get('admin/editAddOn/{id}/edit', [AddOnController::class, 'EditAddOn'])->name('editAddOn');

    //Admin Update Add On Function
    Route::put('admin/updateAddOn/{id}', [AddOnController::class, 'UpdateAddOn'])->name('updateAddOn');

    //Admin Delete Add On Function
    Route::get('admin/deleteAddOn/{id}/delete', [AddOnController::class, 'DeleteAddOn'])->name('deleteAddOn');

    //MutlipleDelete Add On Function
    Route::post('/mutlipledeleteaddon/delete', [AddOnController::class, 'deleteMultipleAddOn'])->name('mutlipledeleteaddon');

    // Import Add On Function
    Route::post('/admin/importAddOn', [AddOnController::class, 'import']);

    // Show All User Contact
    Route::get('/allcontact', [ContactController::class, 'allcontact'])->name('allcontact');

    // Show All User Order
    Route::get('/allorder', [OrderController::class, 'allorder'])->name('allorder');

    // Show All User Order Detail
    Route::get('/vieworder/{id}', [OrderController::class, 'vieworder'])->name('vieworder');

    //MutlipleDelete User Contact Function
    Route::post('/mutlipledeleteorder/delete', [OrderController::class, 'mutlipledeleteorder'])->name('mutlipledeleteorder');

    //MutlipleDelete User Contact Function
    Route::post('/mutlipledeleteContact/delete', [ContactController::class, 'mutlipledeletecontact'])->name('mutlipledeleteContact');

});

//Logout Admin Function
Route::get('/admin/logout', [AdminController::class, 'logout'])->middleware('isLoggedIn');

//Admin Change Status Function
Route::get('/change-status/{id}', [AdminController::class, 'changeStatus']);

//------------------------------------------------------Frontend Control Area------------------------------------------------------//
// About Page
Route::get('/about', [UserController::class, 'about'])->name('about');

//------------------------------------------------------Frontend Service Area------------------------------------------------------//
// Service Page
Route::get('/service', [UserController::class, 'service'])->name('service');

//------------------------------------------------------Frontend Food Control Area-------------------------------------------------//
// Menu Page
Route::get('/food', [UserController::class, 'food'])->name('food');
// Menu Page Food Detail
// Route::get('/food-detail/{id}', [UserController::class, 'FoodDetail'])->name('food-detail');
Route::get('/food-detail/{productId}/{variantId}/{id}', [UserController::class, 'FoodDetail'])->name('food-detail');

// Route::get('/food-detail/{id}', [UserController::class, 'FoodDetail'])->name('food-detail');

//------------------------------------------------------Frontend Contact Control Area-------------------------------------------------//
// Contact Page
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

// Contact Us Function with Email
Route::post('/contactUs', [ContactController::class, 'contactUs'])->name('contactUs');

//------------------------------------------------------Frontend User Wishlist Control Area------------------------------------------//
// User Add to Wishlist Function
Route::post('/wishlist/add', [WishlistController::class, 'AddToWishlist'])->name('user.AddToWishlist');
// Show User Wishlist
Route::get('/wishlist', [WishlistController::class, 'ShowWishlist'])->name('user.ShowWishlist');
// Delete User Wishlist
Route::get('/deletewishlist/{id}', [WishlistController::class, 'deletewishlist'])->name('user.deletewishlist');

//---------------------------------------------Cart Control Area-----------------------------------------------//
// Show Cart Page
// Route::get('/MyCart', [CartController::class, 'MyCart'])->name('user.MyCart');
// Add To Cart Page
Route::post('/AddToCart', [CartController::class, 'AddToCart'])->name('user.AddToCart');
// Display Cart Page
Route::get('/MyCart', [CartController::class, 'displayCart'])->name('cart.display');

//---------------------------------------------Cart Control Area-----------------------------------------------//
// Order Page
Route::get('/order', [OrderController::class, 'myOrder'])->name('myOrder');
// Order With Id Page
Route::get('/orders/{orderId}', [OrderController::class, 'show']);
// Payment Function
Route::post('stripe/checkout', [OrderController::class, 'stripeCheckout'])->name('stripe.checkout');
// Payment Success
Route::get('stripe/checkout/success',[OrderController::class,'stripeCheckoutSuccess'])->name('stripe.checkout.success');

