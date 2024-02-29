<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('childSubcategory_id')->nullable();
            $table->string('product_name_en')->nullable();
            $table->string('product_name_bn')->nullable();
            $table->string('product_slug_en')->nullable();
            $table->string('product_slug_bn')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_tags_en')->nullable();
            $table->string('product_tags_bn')->nullable();
            $table->string('product_size_en')->nullable();
            $table->string('product_size_bn')->nullable();
            $table->string('product_color_bn')->nullable();
            $table->string('product_color_en')->nullable();
            $table->float('selling_price',10,2)->nullable();
            $table->float('discount_price',10,2)->nullable();
            $table->string('short_descp_en')->nullable();
            $table->string('short_descp_bn')->nullable();
            $table->text('long_descp_en')->nullable();
            $table->text('long_descp_bn')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
