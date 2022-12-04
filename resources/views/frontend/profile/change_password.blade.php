@extends('frontend.main_master')
@section('content')
@php
//here we are using Query Builder not Eloquint ORM

  // $user =  DB::table('users')->where('id',Auth::user()->id)->first();
@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card_img_top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path)) ? 
                url('upload/user_images/'.$user->profile_photo_path)
                : url('upload/No_Image.jpg') }}" height="100%" width="100%"><br><br>

                <ul class="list-group list-group-fluch">
                    <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            
            </div><!--end of col-md  2 div-->

            <div class="col-md-2">
            
            
            </div><!--end of col-md 2 div-->

            <div class="col-md-6">
            <div class="card">

                <h3 class="text-center"><span class="text-danger">Change Password</span></h3>

    <div class="card_body">

    <form method="post" action="{{route('user.password.update')}}">
        @csrf

        <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Current Password<span>*</span></label>
	    	<input type="password" name="oldpassword" id="current_password" type="password" class="form-control unicase-form-control text-input" >
			@error('oldpassword')
				<span class="invaild-feedback" role="alert">

					<strong>{{$message}}</strong>

				</span>
			@enderror
	  	</div>

          <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">New Password<span>*</span></label>
	    	<input type="password" name="password" id="password" type="password" class="form-control unicase-form-control text-input">
			@error('password')
				<span class="invaild-feedback" role="alert">

					<strong>{{$message}}</strong>

				</span>
			@enderror
	  	</div>


          <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Confirm Password <span>*</span></label>
	    	<input name="password_confirmation" id="password_confirmation" type="password" class="form-control unicase-form-control text-input">
			@error('password_confirmation')
				<span class="invaild-feedback" role="alert">

					<strong>{{$message}}</strong>

				</span>
			@enderror
	  	</div>


          
          <div class="form-group">
	    	<button type="submit" class="btn btn-danger">Update</button>
	  	</div>
    </form>
</div>


            </div>
            
            </div><!--end of col-md -6 div-->

        </div><!--end of row div-->
    </div>
</div>


@endsection