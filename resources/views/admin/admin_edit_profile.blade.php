
@extends('admin.admin_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Profile Edit</h4>
        
       </div>
       <!-- /.box-header -->
       <div class="box-body">
<div class="row">
<div class="col">
    <form  method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.store')}}">
        @csrf
       
        <div class="row">
        <div class="col-12">	
            
            <div class="row"> <!--adding new div -->
            
                <div class="col-md-6"><!--adding 2 new div with col 6-->


                    <div class="form-group">
                        <h5>Admin User Name<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="name" value="{{ $adminEdit->name}}" class="form-control" required="">
                    </div>
                    </div>
                </div>

                <div class="col-md-6"><!--adding 2 new div with col 6-->


                    <div class="form-group">
                        <h5>Admin Email <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="email" name="email" value="{{ $adminEdit->email}}" class="form-control" required="">
                    </div>
                    </div>
                </div>
            
            </div>

            
            <div class="row"> <!--adding new div -->
            
                <div class="col-md-6">

            <div class="form-group">
                <h5>File Input Field <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" name="ProfilePhoto" id="Aimg" onchange="previewFile(this);" class="form-control" required="">
                </div>
            </div> 
    
            </div>

            <div class="col-md-6"> <!--Another div for displaying images-->
                <img id="showImage"  src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_images/'.$adminData->profile_photo_path)
                : url('upload/No_Image.jpg')}}" style="width: 100px; height:100px;">
            </div>

            </div>
            <!--adding new div -->
            
        
            


       
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
</div> 

<script type="text/javascript">

$(document).ready(function() {
    $("#Aimg").change(function (e) {
        
        
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#showImage")
                    .attr("src", event.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
         
        </script>




@endsection
