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
                        <h3 class="box-title">Update SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('subcategory.update') }}" >
                                @csrf

                                <input type="hidden" value="{{  $subcategory->id}}" name="id">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="select" required="" class="form-control" >
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id?'selected':'' }}>{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Subcategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}" class="form-control" required=""
                                        >
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Subcategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_ban" value="{{ $subcategory->subcategory_name_ban }}" class="form-control" required=""
                                        >
                                        @error('subcategory_name_ban')
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
