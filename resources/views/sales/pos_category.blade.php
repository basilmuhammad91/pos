@extends('layouts.master_dashboard')

@section('master_body')

<?php

$blade_users = DB::table('users')
->join('role_users','role_users.user_id','=','users.id')
->join('roles','roles.role_id','=','role_users.role_id')
->where('users.id', Auth::user()->id)
->first();

?>

<!-- DROPDOWN CSS -->

    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" >
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/select2/css/select2-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/selectize/css/selectize.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/selectric/css/selectric.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/selectize/css/selectize.bootstrap3.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/iCheck/css/all.css">
    <Link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/iCheck/css/line/line.css">

<!-- END -->

<!--page level css -->
	<link rel="stylesheet" href="vendors/toolbar/css/jquery.toolbar.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

	<link type="text/css" href="css/tab.css" rel="stylesheet">
<!--end of page level css-->

<style type="text/css">

    .box
    {
        height: 100%;
    }

	.box:hover
	{
		transform: scale(1.05);
		transition: 0.5s;
	}
</style>

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Categories / Brands
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{action('MainController@dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active">
                    Categories / Brands
                </li>
                
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!--Second Table-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-primary filterable">

                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">
                                <i class="fa fa-fw fa-users"></i> All Categories / Brands
                            </h3>
                        </div>
                        <div class="card-body text-center">
                            
                            @if($blade_users->role_name == 'Manager' || $blade_users->role_name == 'Admin')
                            <div class="row text-right">
                                <div class="col-md-12">
                                    <span class="btn btn-success float-right mr-3" data-toggle="modal" data-target="#formModal" style="float: right;">
                                        <i class="fa fa-plus"></i>
                                        <span>Add Categories / Brands</span>
                                    </span>
                                </div>
                            </div>
                            @endif

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-validation3" action="{{action('CategoryController@submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 offset-3">
                            <div class="form-group">
                                <input type="text" name="name"
                                       id="modalfirst_name"
                                       class="form-control input-md"
                                       placeholder="Customer Name" tabindex="1"
                                       data-error="First name must be entered"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 offset-3">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h5>Select Image</h5>
                                    <div class="">
                                        <input type="file" id="imgUpload" name="image" class="dropify">
                                        <!-- <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong happended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" class="dropify"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div> -->
                                    </div>
                                </div>
                                <div class="col-md-12 text-left">
                                    <img id="imgPreview" style="width: 100px !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                              <!-- END OF SELECT DROPDOWN -->
                        <div class="col-md-6 text-left offset-3">
                            <input type="submit" id="btncheck" value="Add Category / Brand"
                                   class="btn btn-primary btn-block btn-md btn-responsive"
                                   tabindex="7" style="color: white;">
                        </div>
                    </div>
                    <!-- <div class="row marginTop">
                        <div class="col-6 col-md-6">
                            <input type="submit" id="btncheck" value="Add Customer"
                                   class="btn btn-primary btn-block btn-md btn-responsive"
                                   tabindex="7">
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                            
                        	<div class="row">

                                <div class="col-md-2 text-center mb-3 mt-5">
                                    <div class="text-center" style="width: fit-content; margin: auto;">
                                        <div class="box px-3 py-3" style="background-color: #428BCA; width: fit-content; border-radius: 0.6em; box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); cursor: pointer;" onclick="location.href = '{{action('SaleController@pos')}}?category_id=0'">
                                            <div class="sub-box px-4 py-4" style="background-color: white; margin-bottom: 0.5em; box-shadow: inset 0 0 4px #000000; ">
                                                
                                                <img src="{{asset('DashboardAssets')}}/img/category-icon.png" class="img-fluid" width="100">

                                            </div>
                                            <span style="color: white; margin-top: 1em; font-size: 1.5em; ">ALL PRODUCTS</span>
                                        </div>
                                    </div>
                                </div>

                        		@foreach($category as $obj)
                        		<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 text-center mb-3 mt-5">
	                        		<div class="text-center" style="width: fit-content; margin: auto;">
	                        			<div class="box px-3 py-3" style="background-color: #428BCA; width: fit-content; border-radius: 0.6em; box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); cursor: pointer;" onclick="location.href = '{{action('SaleController@pos')}}?category_id={{$obj->category_id}}'">
	                        				<div class="sub-box px-4 py-4" style="background-color: white; margin-bottom: 0.5em; box-shadow: inset 0 0 4px #000000; ">
	                        					
	                        					@if($obj->image != null)

	                        					<img src="{{asset('storage/'.$obj->image)}}" width="100"></td>

	                        					@else
	                        					<img src="{{asset('DashboardAssets')}}/img/category-icon.png" class="img-fluid" width="100">

	                        					@endif

	                        				</div>
                        					<span style="color: white; margin-top: 1em; font-size: 1.5em; ">{{ $obj->name }}</span>
	                        			</div>
	                        		</div>
	                        	</div>
	                        	@endforeach
                        	</div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Table End -->
        </section>
    </aside>
<!-- wrapper-->
<!-- global js -->
<!-- <script src="{{asset('DashboardAssets')}}/js/app.js" type="text/javascript"></script> -->
<!-- end of global js -->
<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.colReorder.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.rowReorder.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.colVis.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.html5.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.print.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.print.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.scroller.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/mark_js/js/jquery.mark.js" charset="UTF-8"></script>
<script src="{{asset('DashboardAssets')}}/vendors/datatablesmark.js/js/datatables.mark.min.js" charset="UTF-8"></script>
<script src="{{asset('DashboardAssets')}}/js/custom_js/responsive_datatables.js" type="text/javascript"></script>

<!-- end of global js -->


<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/select2/js/select2.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/select2/js/select2.full.js"></script>

<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/selectize/js/standalone/selectize.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/iCheck/js/icheck.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/selectric/js/jquery.selectric.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/js/custom_js/custom_elements.js"></script>
<!-- end of page level js -->

<!-- NOTIFICATION JS -->
<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.animate.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.buttons.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.confirm.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.nonblock.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.mobile.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.desktop.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.history.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.callbacks.js"></script>

<!-- end of page level js -->
<script src="{{asset('DashboardAssets')}}/vendors/granim/js/granim.min.js" type="text/javascript"></script>

<!-- begining of page level js -->
<script type="text/javascript" src="vendors/toolbar/js/jquery.toolbar.min.js"></script>
<script type="text/javascript" src="js/custom_js/tabs_accordions.js"></script>
<!-- end of page level js -->

</body>


<!-- Mirrored from coreplusdemo.lorvent.com/responsive_datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 May 2021 12:35:13 GMT -->
</html>

@endsection

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    <?php
    if($status=="Submitted")
    {
        ?>
        new PNotify({
                title: 'Great! You have added a discount offer',
                title_escape: true,
                type: 'success',
                text: $('#evil_html').html(),
                text_escape: true
            });
        <?php
    }
    ?>

    <?php
    if($status=="Updated")
    {
        ?>
        new PNotify({
                title: 'Updated Successfully !',
                title_escape: true,
                type: 'success',
                text: $('#evil_html').html(),
                text_escape: true
            });
        <?php
    }
    ?>

});
</script>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgPreview').attr('src', e.target.result);
        }
          reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
$("#imgUpload").change(function(){
    readURL(this);
});
    
});
</script>

<script>
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader2 = new FileReader();
        reader2.onload = function (e) {
            $('#imgPreview2').attr('src', e.target.result);
        }
          reader2.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
$("#imgUpload2").change(function(){
    readURL2(this);
});
    
});
</script>

