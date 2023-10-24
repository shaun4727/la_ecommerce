<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
Route::get('/',[IndexController::class, 'index']);
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
