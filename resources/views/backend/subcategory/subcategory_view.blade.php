@extends('admin.admin_master')

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Subcategory Eng</th>
                                        <th>Subcategory Ban</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <td>{{ $subcategory['category']['category_name_en'] }}</td>
                                            <td>{{ $subcategory->subcategory_name_en }}</td>
                                            <td>{{ $subcategory->subcategory_name_ban }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-info"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('subcategory.delete', $subcategory->id) }}" id="delete-brand" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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
                            <form method="POST" action="{{ route('subcategory.store') }}" >
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
                                    <h5>Subcategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_en" class="form-control" required=""
                                        >
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Subcategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_ban" class="form-control" required=""
                                        >
                                        @error('subcategory_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

@endsection

