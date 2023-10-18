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
                            <form method="POST" action="{{ route('category.update') }}" >
                                @csrf

                                <input type="hidden" value="{{  $category->id}}" name="id">
                                <div class="form-group">
                                    <h5>Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" value="{{ $category->category_name_en }}" class="form-control" required=""
                                        >
                                        @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Category Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_ban" class="form-control" value="{{ $category->category_name_ban }}" required=""
                                        >
                                        @error('category_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control"  value="{{ $category->category_icon }}" required=""
                                        >
                                        @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
