<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function sliderStore(Request $request){


        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/brand'.$name_gen);
        $save_url = 'upload/brand'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
            'status' => $request->status
        ]);


        return redirect()->back();
    }

    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }

    public function sliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('slider_img')){
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/brand'.$name_gen);
            $save_url = 'upload/brand'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
                'status' => $request->status?$request->status:0,
            ]);
        }else{
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status?$request->status:0,
            ]);
        }

        return redirect()->route('manage.slider');
    }

    public function sliderDelete($id){
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);

        Slider::findOrFail($id)->delete();

        return redirect()->route('manage.slider');
    }
}
