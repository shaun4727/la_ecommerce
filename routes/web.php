<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\AllUserController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CashController;

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


// AdminController starts
Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'login_form']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:admin'])->group(function(){
    Route::middleware([
        'auth:sanctum,admin',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');
    });

    Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::post('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('update.admin.password');
    Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
});
// AdminController Ends

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        $user = User::find(Auth::user()->id);

        return view('dashboard',compact('user'));
    })->name('dashboard');
});




// user all routes
Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('/user/logout',[IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update',[IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
Route::get('/user/update/password',[IndexController::class, 'UserUpdatePassword'])->name('user.update.password');
Route::get('/user/change/password',[IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/user/update/password',[IndexController::class, 'UserUpdatePassword'])->name('user.update.password');


// all admin brand routes
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');
});

// all admin category routes
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete');
});

// all admin subcategory routes
Route::prefix('subcategory')->group(function(){
    Route::get('/sub/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store',[SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('sub/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('sub/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');


    // all admin child category routes
    Route::get('/childrenCategory/view',[SubCategoryController::class, 'childrenCategoryView'])->name('all.childCategory');
    Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class, 'GetSubCategory'])->name('get.all.childCategory');
    Route::get('/child_subcategory/ajax/{subcategory_id}',[SubCategoryController::class, 'GetChildSubCategory'])->name('get.all.childCategory');
    Route::post('/subcategory/store',[SubCategoryController::class, 'SubCategoryChildStore'])->name('childSubCategory.store');
    Route::get('childSub/edit/{id}',[SubCategoryController::class, 'SubCategoryChildEdit'])->name('subcategoryChild.edit');
    Route::post('childSub/update',[SubCategoryController::class, 'childSubCategoryUpdate'])->name('childSubcategory.update');
    Route::get('childSub/delete/{id}',[SubCategoryController::class, 'childSubCategoryDelete'])->name('subcategoryChild.delete');
});


// all admin brand routes
Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store',[ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/manage',[ProductController::class, 'manageProduct'])->name('manage.product');
    Route::get('/edit/{id}',[ProductController::class, 'productEdit'])->name('product.edit');
    Route::post('/update',[ProductController::class, 'productUpdate'])->name('product.update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update.product.image');
    Route::post('/thumbnail/update', [ProductController::class, 'thumbnailImageUpdate'])->name('update.product.thumbnail');
    Route::get('multiImg/delete/{id}',[ProductController::class, 'multiImgDelete'])->name('product.multiImg.delete');
    Route::get('/delete/{id}',[ProductController::class, 'productDelete'])->name('product.delete');
});


// all admin slider routes
Route::prefix('slider')->group(function(){
    Route::get('/view',[SliderController::class, 'sliderView'])->name('manage.slider');
    Route::post('/store',[SliderController::class, 'sliderStore'])->name('slider.store');
    Route::get('/edit/{id}',[SliderController::class, 'sliderEdit'])->name('slider.edit');
    Route::post('/update',[SliderController::class, 'sliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class, 'sliderDelete'])->name('slider.delete');
});







// frontend all routes
Route::get('/language/bangla',[LanguageController::class, 'bangla'])->name('bangla.language');
Route::get('/language/english',[LanguageController::class, 'english'])->name('english.language');
Route::get('/product/details/{id}/{slug}',[IndexController::class, 'productDetail']);
Route::get('/product/details/{tag}',[IndexController::class, 'tagWiseProduct']);
Route::get('/subcategory/product/{sub_cat_id}/{slug}',[IndexController::class, 'subCatWiseProduct']);
Route::get('/child_subcategory/product/{child_sub_cat_id}/{slug}',[IndexController::class, 'childCatWiseProduct']);
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::get('/product/mini/cart', [CartController::class, 'addMiniCart']);
Route::get('/product/mini/cart-remove/{rowId}', [CartController::class, 'removeMiniCart']);
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    Route::get('/product/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');
    Route::get('/my/orders', [AllUserController::class, 'myOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

});
Route::get('/user/product/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);



// all admin coupon routes
Route::prefix('coupons')->group(function(){
    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage.coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
});


// all admin shipping routes
Route::prefix('shipping')->group(function(){
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage.division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage.district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage.state');
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
});

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


// Checkout Routes
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
