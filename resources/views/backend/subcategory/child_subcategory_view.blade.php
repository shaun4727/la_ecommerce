@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Child Sub Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Child Subcategory Eng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ChildSubcategories as $cCategory)
                                        <tr>
                                            <td>{{ $cCategory['category']['category_name_en'] }}</td>
                                            <td>{{ $cCategory['subCategory']['subcategory_name_en'] }}</td>
                                            <td>{{ $cCategory->childCategory_name_en }}</td>
                                            <td>
                                                <a href="{{ route('subcategoryChild.edit', $cCategory->id) }}" class="btn btn-info"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('subcategoryChild.delete', $cCategory->id) }}" id="delete-brand" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>

            {{-- add brand name --}}
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Sub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('childSubCategory.store') }}" >
                                @csrf


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

                                <div class="form-group">
                                    <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="select" required="" class="form-control" >
                                            <option value="" selected="" disabled>Select SubCategory</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Childcategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="childCategory_name_en" class="form-control" required=""
                                        >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Childcategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="childCategory_name_bn" class="form-control" required=""
                                        >

                                    </div>
                                </div>









                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add">
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
      });
      </script>

@endsection

