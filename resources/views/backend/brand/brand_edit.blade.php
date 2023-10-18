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
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('brand.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{  $brand->id}}" name="id">
                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                <div class="form-group">
                                    <h5>Brand Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" class="form-control" required=""
                                        >
                                        @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Brand Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="brand_name_ban" class="form-control" value="{{ $brand->brand_name_ban }}" required=""
                                        >
                                        @error('brand_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control"
                                        >
                                        @error('brand_image')
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
