@extends('admin.admin_master')

@section('content')
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Form Validation</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>User Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required=""
                                                        value="{{ $editData->name }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Upload Profile Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file"  accept="image/*" onchange="previewImage(event)" name="profile_photo_path" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img id="showImage" src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images/'.$editData->profile_photo_path):url('upload/admin_images/avatar-1.png') }}" alt=""
                                                style="width:100px; height: 100px;"
                                            >
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Update</button>
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
        const previewImage = (e) => {
            const imageFiles = e.target.files;
            const imageFilesLength = imageFiles.length;

            if(imageFilesLength > 0){
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                const imagePreviewElement = document.querySelector("#showImage");
                imagePreviewElement.src = imageSrc;
            }
        }
    </script>
@endsection
