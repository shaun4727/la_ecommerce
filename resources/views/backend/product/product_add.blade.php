@extends('admin.admin_master')

@section('content')


<!-- Main content -->
<section class="content">

 <!-- Basic Forms -->
  <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Add Product</h4>
      <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col">
            <form novalidate>
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
                                    <select name="ChildSubCategory" id="select" required="" class="form-control" >
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
                                    <select name="product_code" id="select" required="" class="form-control" >
                                        <option selected disabled>Select Product Code</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_bn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <h5>File Input Field <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="file" class="form-control" required> </div>
                    </div>
                    <div class="form-group">
                        <h5>Basic Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="select" id="select" required class="form-control">
                                <option value="">Select Your City</option>
                                <option value="1">India</option>
                                <option value="2">USA</option>
                                <option value="3">UK</option>
                                <option value="4">Canada</option>
                                <option value="5">Dubai</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Textarea <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                        </div>
                    </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Checkbox <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="checkbox" id="checkbox_1" required value="single">
                                <label for="checkbox_1">Check this custom checkbox</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Checkbox Group <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" required value="x">
                                    <label for="checkbox_2">I am unchecked Checkbox</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" value="y">
                                    <label for="checkbox_3">I am unchecked too</label>
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
        document.querySelector('select[name="category_id"]').addEventListener('change',()=>{
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/subcategory/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
    })

  });
  </script>

@endsection

