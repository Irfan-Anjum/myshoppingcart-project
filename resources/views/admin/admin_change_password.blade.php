
@extends('admin.admin_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Password Change</h4>
        
       </div>
       <!-- /.box-header -->
       <div class="box-body">
<div class="row">
<div class="col">
    <form  method="POST" action="{{ route('admin.update.password')}}">
        @csrf
       
        <div class="row">
        <div class="col-12">	
            
            <div class="row"> <!--adding new div -->
            
<div class="col-md-6"><!--adding 2 new div with col 6-->


            <div class="form-group">
                <h5>Current Password<span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="password" name="oldpassword" id="oldpassword" class="form-control" required="">
            </div>
            </div>
            <div class="form-group">
                <h5>Current Password<span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="password" name="password" id="password" class="form-control" required="">
            </div>
            </div>
            <div class="form-group">
                <h5>New Password<span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="">
            </div>
            </div>
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
