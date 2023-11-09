@extends('frontend.master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-center text-danger">
                            Hi...
                        </span>
                        <strong>{{ Auth::user()->name }}</strong>
                        Update your profile
                    </h3>
                    <div class="card-body" style="margin-bottom:5px">
                        <form action="{{ route('user.update.password') }}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Old Password <span></span></label>
                                <input type="password" name="old_password" required class="form-control unicase-form-control text-input"
                                id="name">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">New Password <span></span></label>
                                <input type="password" name="new_password" required class="form-control unicase-form-control text-input"
                                id="email">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Confirm Password <span></span></label>
                                <input type="password" name="confirm_password"  required class="form-control unicase-form-control text-input"
                                id="phone">
                            </div>
                            <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
