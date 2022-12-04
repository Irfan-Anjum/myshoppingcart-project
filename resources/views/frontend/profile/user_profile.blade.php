@extends('frontend.main_master')
@section('content')
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

                <h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong>
               Update your profile</h3>

    <div class="card_body">

    <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Name<span>*</span></label>
	    	<input type="text" name="name" value="{{$user->name}}" class="form-control unicase-form-control text-input" >
			@error('name')
				<span class="invaild-feedback" role="alert">

					<strong>{{$message}}</strong>

				</span>
			@enderror
	  	</div>

          <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" name="email" value="{{$user->email}}" class="form-control unicase-form-control text-input" id="email" >
			@error('email')
				<span class="invaild-feedback" role="alert">

					<strong>{{$message}}</strong>

				</span>
			@enderror
	  	</div>


          <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Phone <span>*</span></label>
	    	<input type="text" name="phone" value="{{$user->phone}}" class="form-control unicase-form-control text-input">
			@error('phone')
				<span class="invaild-feedback" role="alert">

					<strong>{{$message}}</strong>

				</span>
			@enderror
	  	</div>


          <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">User Image <span>*</span></label>
	    	<input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input" id="email" >
			@error('email')
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