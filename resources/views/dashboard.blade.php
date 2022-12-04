@extends('frontend.main_master')
@section('content')


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card_img_top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path)) ? 
                    url('upload/user_images/'.$user->profile_photo_path)
                    : url('upload/No_Image.jpg') }}" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-fluch">
                    <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            
            </div><!--end of col-md  2 div-->

            <div class="col-md-2">
            
            
            </div><!--end of col-md 2 div-->

            <div class="col-md-6">
            <div class="card">

                <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{Auth::user()->name}}</strong>
               Welcome to my Jewellery Shop</h3>
            </div>
            
            </div><!--end of col-md -6 div-->

        </div><!--end of row div-->
    </div>
</div>


@endsection