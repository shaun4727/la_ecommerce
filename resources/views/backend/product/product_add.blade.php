@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Main content -->
<section class="content">

 <!-- Basic Forms -->
  <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Add Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
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
                                        <option value="{{ $brand->id }}" >{{ $brand->brand_name_en }}</option>
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
                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_bn" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_bn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_bn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Color En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Color Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_bn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="selling_price"  class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="discount_price" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Main Product Thumbnail <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="product_thumbnail" onChange="mainThamUrl(this)" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                                <img src="" id="mainThmb">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Multiple Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="multi_img[]"  multiple="" id="multiImg" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                                <div class="row" id="preview_img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" name="short_descp_en" class="form-control" required data-validation-required-message="This field is required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" name="short_descp_bn" class="form-control" required data-validation-required-message="This field is required"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" id="editor1" name="long_descp_en" class="form-control" required data-validation-required-message="This field is required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Bn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" id="editor2" name="long_descp_bn" class="form-control" required data-validation-required-message="This field is required"></textarea>
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
                                    <input type="checkbox" id="checkbox_2" value="1" name="hot_deals">
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" value="1" name="featured">
                                    <label for="checkbox_3">Featured</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" value="1" name="status" >
                                    <label for="checkbox_4">Status</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_5"  value="1" name="special_offer">
                                    <label for="checkbox_5">Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_6" value="1" name="special_deals">
                                    <label for="checkbox_6">Special Deals</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
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

