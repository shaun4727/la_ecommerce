@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Main content -->
<section class="content">

 <!-- Basic Forms -->
  <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Edit Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('product.update') }}" >
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
              <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="brand_id" id="select" required="" class="form-control" >
                                        <option selected disabled>Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id?'selected':'' }}>{{ $brand->brand_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" id="select" required="" class="form-control" >
                                        <option value="" selected="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id?'selected':'' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" id="select" required="" class="form-control" >
                                        <option value="" selected="" disabled>Select SubCategory</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id?'selected':''  }}>{{ $subcategory->subcategory_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Child Sub Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="childSubcategory_id" id="select" required="" class="form-control" >
                                        <option selected disabled>Select Child Sub Category</option>
                                        @foreach($childSubcategories as $cSubcategory)
                                        <option value="{{ $cSubcategory->id }}" {{ $cSubcategory->id == $product->childSubcategory_id?'selected':''  }}>{{ $cSubcategory->childCategory_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" value="{{ $product->product_name_en }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_bn" value={{ $product->product_name_bn }} class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control" value={{ $product->product_code }} required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" value="{{ $product->product_qty }}" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_en" class="form-control" value="{{ $product->product_tags_en }}" data-role="tagsinput" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_bn" class="form-control" value="{{ $product->product_tags_bn }}" data-role="tagsinput" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_en" class="form-control" value="{{ $product->product_size_en }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_bn" class="form-control" value="{{ $product->product_size_bn }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Color En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_en" class="form-control" value="{{ $product->product_color_en }}" data-role="tagsinput" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Color Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_bn" class="form-control" value="{{ $product->product_color_bn }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="selling_price" value={{ $product->selling_price }} class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="discount_price" value={{ $product->discount_price }} class="form-control"  >
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" name="short_descp_en" class="form-control" required data-validation-required-message="This field is required">{!! $product->short_descp_en !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" name="short_descp_bn" class="form-control" required data-validation-required-message="This field is required">{!! $product->short_descp_bn !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" id="editor1" name="long_descp_en" class="form-control" required data-validation-required-message="This field is required">{!! $product->long_descp_en !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" id="editor2" name="long_descp_bn" class="form-control" required data-validation-required-message="This field is required">{!! $product->long_descp_bn !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
              <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" value="1" name="hot_deals" {{ $product->hot_deals == 1?'checked':'' }}>
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" value="1" name="featured" {{ $product->featured == 1?'checked':'' }}>
                                    <label for="checkbox_3">Featured</label>
                                </fieldset>

                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" value="1" name="status" {{ $product->status == 1?'checked':'' }}>
                                    <label for="checkbox_4">Status</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_5"  value="1" name="special_offer" {{ $product->special_offer == 1?'checked':'' }}>
                                    <label for="checkbox_5">Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_6" value="1" name="special_deals" {{ $product->special_deals == 1?'checked':'' }}>
                                    <label for="checkbox_6">Special Deals</label>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
                </div>
            </form>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>

<secion class="content">
    <div class="box-body">
        <div class="col">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                      <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                      </div>
                      <form action="{{ route('update.product.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row row-sm">
                                @foreach($multiImgs as $img)
                                <div class="col-md-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($img->photo_name) }}" class="card-img-top " alt="...">
                                        <div class="card-body">
                                          <h5 class="card-title"><a href="{{ route('product.multiImg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a></h5>
                                          <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="file" name="multi_img[ {{ $img->id }} ]">
                                            </div>
                                          </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5 ml-3" value="Update Image">
                            </div>
                            <br><br>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</secion>
<secion class="content">
    <div class="box-body">
        <div class="col">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                      <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                      </div>
                      <form action="{{ route('update.product.thumbnail') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value={{ $product->id }}>
                        <input type="hidden" name="old_img" value={{ $product->product_thumbnail }}>
                            <div class="row row-sm">

                                <div class="col-md-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top " alt="...">
                                        <div class="card-body">

                                          <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="product_thumbnail"  onChange="mainThamUrl(this)" class="form-control" required data-validation-required-message="This field is required">
                                            </div>
                                          </p>
                                          <img src="" id="mainThmb">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5 ml-3" value="Update Image">
                            </div>
                            <br><br>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</secion>

<script type="text/javascript">

    $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/subcategory/subcategory/ajax') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                        $('select[name="ChildSubCategory"]').html('');
                         var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
          });


          $('select[name="subcategory_id"]').on('change', function(){
              var subcategory_id = $(this).val();
              if(subcategory_id) {
                  $.ajax({
                      url: "{{  url('/subcategory/child_subcategory/ajax') }}/"+subcategory_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="childSubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="childSubcategory_id"]').append('<option value="'+ value.id +'">' + value.childCategory_name_en + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
          });
      });

      function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}


    $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
  </script>

@endsection

