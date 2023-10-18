<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childCategory_name_en',
        'childCategory_name_bn',
        'childCategory_slug_en',
        'childCategory_slug_bn'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
