<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;



class ReviewController extends Controller
{
    public function StoreReview(Request $request){
        $userId = Auth::user()->id;

        $review = Review::where('customer_id',$userId)->where('product_id',$request->product_id)->first();
        if(isset($review)){
            $review->rating = $request->quality;
            $review->save();
        }else{
            Review::create([
                'product_id' => $request->product_id,
                'customer_id' => $userId,
                'rating' => $request->quality,
            ]);
        }
        return redirect()->back();
    }
}
