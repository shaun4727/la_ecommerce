<div class="col-md-2" style="display: flex; justify-content:center; flex-direction:column;align-items:center; gap:5px;">
    <img src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/user_images/avatar-1.png') }}"
     style="border: 1px solid #fff; border-radius:50%; height:100px; width:100px;  " alt="" class="card-img-top">

     <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
     </ul>
</div>
