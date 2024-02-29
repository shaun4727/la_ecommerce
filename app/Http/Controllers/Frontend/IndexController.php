<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->get();
        $products = Product::where('status',1)->get();
        $sproducts = Product::where('special_offer',1)->get();
        $dproducts = Product::where('special_deals',1)->get();



        // constructing special offer data
        $special_offer = array();
        $sub_array = array();
        $count = 0;

        foreach($sproducts as $product){
            array_push($sub_array,$product);
            if($count == 2){
                $count = -1;
                array_push($special_offer,$sub_array);
                $sub_array = array();
            }

            $count++;
        }
        if(count($sub_array)>0){
            array_push($special_offer,$sub_array);
            $sub_array = array();
        }

        // constructing special deal data
        $special_deal = array();
        $count1 = 0;
        foreach($dproducts as $product){
            array_push($sub_array,$product);
            if($count1 == 2){
                $count1 = -1;
                array_push($special_deal,$sub_array);
                $sub_array = array();
            }

            $count1++;
        }
        if(count($sub_array)>0){
            array_push($special_deal,$sub_array);
            $sub_array = array();
        }

        $skip_category_one = Category::skip(1)->first();
        $skip_product_one = Product::where('status',1)->where('category_id',$skip_category_one->id)->orderBy('id','DESC')->get();

        // dd($special_deal);
        // $special_deal = [];
        // $special_offer = [];
        return view('frontend.index',compact('categories','sliders','products','special_offer','special_deal','skip_product_one'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');

    }


    public function searchProduct(Request $request){
        $search = $request->search;
        $products = Product::where(function($query) use ($search){
            $query->where('product_name_en','like',"%$search%");
        })->where('status',1)->orderBy('id','DESC')->paginate(1);



        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.product.subcategory_view',compact('products','categories'));
    }



    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.user_profile',compact('user'));
    }

    public function UserProfileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            if($data->profile_photo_path){
                @unlink(public_path(('upload/user_images/'.$data->profile_photo_path)));
            }
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.user_update_password',compact('user'));
    }

    public function UserUpdatePassword(Request $request){


        $user = User::find(Auth::user()->id);
        $hashedPassword = $user->password;
        if(Hash::check($request->old_password,$hashedPassword)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }

    }

    public function productDetail($id,$slug){

        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $products = Product::where('status',1)->get();

        $product_color_en = explode(',',$product->product_color_en);
        $product_size_en = explode(',',$product->product_size_en);

        $related_product = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();

        $review = Review::groupBy('product_id')
                        ->select('product_id',DB::raw('AVG(rating) as rating'))
                        ->where('product_id',$id)
                        ->first();

        if(isset($review)){
            $rating = intval($review->rating);
        }else{
            $rating = 0;
        }


        return view('frontend.product.product_detail',compact('products','product','multiImgs','product_color_en','product_size_en','related_product','rating'));
    }

    public function tagWiseProduct($tag){
        // $products = DB::SELECT("SELECT * FROM PRODUCTS WHERE FIND_IN_SET('".$tag."',product_tags_en)");

        // return $products = Product::whereRaw("FIND_IN_SET('".$tag."',product_tags_en)")->select('*')->paginate(1);
        $products = Product::where('status',1)->paginate(1);
        // return $products->paginate(1);

        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tags_view',compact('products','categories'));
    }

    public function subCatWiseProduct($sub_cat_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$sub_cat_id)->orderBy('id','DESC')->paginate(10);

        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.product.subcategory_view',compact('products','categories'));
    }
    public function childCatWiseProduct($child_sub_cat_id,$slug){
        $products = Product::where('status',1)->where('childSubcategory_id',$child_sub_cat_id)->orderBy('selling_price','ASC')->paginate(10);

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $orderBy = "Lowest first";

        return view('frontend.product.childCatView',compact('products','categories','child_sub_cat_id','slug','orderBy'));
    }

    public function childCatWiseProductOrderBy($child_sub_cat_id,$slug,$orderBy){
        $order = '';
        $field = '';
        if($orderBy === 'Lowest first'){
            $order = 'ASC';
            $field = 'selling_price';
        }
        else if($orderBy === 'A to Z'){
            $order = 'ASC';
            $field = 'product_name_en';
        }
        else{
            $order = 'DESC';
            $field = 'selling_price';
        }
        $products = Product::where('status',1)->where('childSubcategory_id',$child_sub_cat_id)->orderBy($field,$order)->paginate(10);

        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.product.childCatView',compact('products','categories','child_sub_cat_id','slug','orderBy'));
    }

    /// Product View With Ajax
	public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method
}
