<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ChildSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view',compact('subcategories','categories'));
    }

    public function SubCategoryStore(Request $request){
        // dd($request);
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ban' => 'required',
            'category_id' => 'required'
        ],[
            'subcategory_name_en.required' => 'Input SubCategory English Name required',
            'subcategory_name_ban.required' => 'Input SubCategory Bangla Name required'
        ]);



        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_ban' => strtolower(str_replace(' ','-',$request->subcategory_name_ban)),
            'category_id' => $request->category_id,
        ]);


        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_ban' => strtolower(str_replace(' ','-',$request->subcategory_name_ban)),
            'category_id' => $request->category_id,
        ]);


        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }


    // children category

    public function childrenCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $ChildSubcategories = ChildSubCategory::latest()->get();
        return view('backend.subcategory.child_subcategory_view',compact('ChildSubcategories','categories'));
    }

    public function GetSubCategory($category_id){
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcategory);
    }
    public function GetChildSubCategory($subcategory_id){
        $ChildSubcategory = ChildSubCategory::where('subcategory_id',$subcategory_id)->orderBy('childCategory_name_en','ASC')->get();
        return json_encode($ChildSubcategory);
    }

    public function SubCategoryChildStore(Request $request){

        ChildSubCategory::insert([
            'childCategory_name_en' => $request->childCategory_name_en,
            'childCategory_name_bn' => $request->childCategory_name_bn,
            'childCategory_slug_en' => strtolower(str_replace(' ','-',$request->childCategory_name_en)),
            'childCategory_slug_bn' => strtolower(str_replace(' ','-',$request->childCategory_name_bn)),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);


        $notification = array(
            'message' => 'SubChildCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryChildEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subCategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $childSubcategory = ChildSubCategory::findOrFail($id);

        return view('backend.subcategory.child_subcategory_edit',compact('subCategories','categories','childSubcategory'));
    }

    public function childSubCategoryUpdate(Request $request){
        $childSubcategory_id = $request->id;

        ChildSubCategory::findOrFail($childSubcategory_id)->update([
            'childCategory_name_en' => $request->childCategory_name_en,
            'childCategory_name_bn' => $request->childCategory_name_bn,
            'childCategory_slug_en' => strtolower(str_replace(' ','-',$request->childCategory_slug_en)),
            'childCategory_slug_bn' => strtolower(str_replace(' ','-',$request->childCategory_slug_bn)),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);


        $notification = array(
            'message' => 'Child SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.childCategory')->with($notification);
    }

    public function childSubCategoryDelete($id){

        ChildSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Child Sub Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.childCategory')->with($notification);
    }
}
