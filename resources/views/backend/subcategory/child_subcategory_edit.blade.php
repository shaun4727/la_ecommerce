@extends('admin.admin_master')

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">





            {{-- add brand name --}}
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('childSubcategory.update') }}" >
                                @csrf
                                <input type="hidden" name="id" value={{ $childSubcategory->id }}>
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="select" required="" class="form-control" >
                                            <option value="" selected="" disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $childSubcategory->category_id?'selected':''}}>{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="select" required="" class="form-control" >
                                            <option value="" selected="" disabled>Select SubCategory</option>
                                            @foreach($subCategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $childSubcategory->subcategory_id?'selected':''}}>{{ $subcategory->subcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Childcategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="childCategory_name_en" value="{{ $childSubcategory->childCategory_name_en }}" class="form-control" required=""
                                        >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Childcategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="childCategory_name_bn" value="{{ $childSubcategory->childCategory_name_bn }}" class="form-control" required=""
                                        >

                                    </div>
                                </div>







                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
