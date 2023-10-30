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
        $index = 1;

        foreach($sproducts as $product){
            array_push($sub_array,$product);
            if($count == 2){
                $count = 0;
                array_push($special_offer,$sub_array);
                $sub_array = array();
            }elseif($index == count($products)){
                array_push($special_offer,$sub_array);
            }

            $count++;
            $index++;
        }

        // constructing special deal data
        $special_deal = array();
        $count1 = 0;
        $index1 = 1;
        foreach($dproducts as $product){
            array_push($sub_array,$product);
            if($count1 == 2){
                $count1 = 0;
                array_push($special_deal,$sub_array);
                $sub_array = array();
            }elseif($index1 == count($products)){
                array_push($special_deal,$sub_array);
            }

            $count1++;
            $index1++;
        }

        // dd($special_deal);
        // $special_deal = [];
        // $special_offer = [];
        return view('frontend.index',compact('categories','sliders','products','special_offer','special_deal'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');

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


        return view('frontend.product.product_detail',compact('product','multiImgs'));
    }

    public function tagWiseProduct($tag){
        // $products = DB::SELECT("SELECT * FROM PRODUCTS WHERE FIND_IN_SET('".$tag."',product_tags_en)");
        $products = Product::whereRaw("FIND_IN_SET('".$tag."',product_tags_en)")->select('*')->paginate(3);

        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tags_view',compact('products','categories'));
    }
}
