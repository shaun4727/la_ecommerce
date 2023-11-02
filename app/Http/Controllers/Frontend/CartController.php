<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $product = Product::findOrFail($id);

        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                    ]
            ]);

            return response()->json(['success'=>'Successfully Added on your cart']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                    ]
            ]);
            return response()->json(['success'=>'Successfully Added on your cart']);
        }
    }


    public function addMiniCart(){
        $cart_data = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $cart_data,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }

    public function removeMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product removed from cart']);
    }


    public function AddToWishlist(Request $request,$product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if($exists){
                return response()->json(['error' => 'Product already added to Wishlist!']);
            }else{
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Product added to Wishlist!']);
            }

        }else{
            return response()->json(['error' => 'You must log in!']);
        }
    }
}
