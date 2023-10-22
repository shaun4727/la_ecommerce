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
                            <form method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{  $slider->id}}" name="id">
                                <input type="hidden" name="old_image" value="{{ $slider->slider_img }}">
                                <div class="form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control" required=""
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="description" class="form-control" value="{{ $slider->description }}" required=""
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_img" class="form-control"
                                        >
                                    </div>
                                    <img src="{{ asset($slider->slider_img) }}" alt="">
                                </div>

                                <div class="form-group">
                                    <div class="controls">

                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" value="1" name="status" >
                                            <label for="checkbox_4">Status</label>
                                        </fieldset>
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
