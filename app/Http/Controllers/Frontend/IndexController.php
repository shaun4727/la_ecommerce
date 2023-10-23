<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->get();
        $products = Product::where('status',1)->get();
        return view('frontend.index',compact('categories','sliders','products'));
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

    public function productDetail($id){
        $product = Product::where('id',$id);
        return view('frontend.product.product_detail',compact('product'));
    }
}
