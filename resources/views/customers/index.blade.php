@extends('layouts.master_dashboard')
@section('master_body')

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

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List of All Customers
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{action('MainController@dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active">
                    Customers
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
                                <i class="fa fa-fw fa-users"></i> All Customers
                            </h3>
                        </div>
                        <div class="card-body">
                        	<span class="btn btn-success float-right mr-3" data-toggle="modal" data-target="#formModal">
	                            <i class="fa fa-plus"></i>
	                            <span>Add Customer</span>
                            </span>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Add Customer</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">??
                </button>
            </div>
            <div class="modal-body">
                <form id="form-validation3" action="{{action('CustomerController@submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="name"
                                       id="modalfirst_name"
                                       class="form-control input-md"
                                       placeholder="Customer Name" tabindex="1"
                                       data-error="First name must be entered"
                                       required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="father_name"
                                       id="modallast_name"
                                       class="form-control input-md"
                                       placeholder="Customer Father Name" tabindex="2"
                                       data-error="Last name must be entered"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="email"
                                       class="form-control input-md"
                                       placeholder="Email Address" tabindex="4"
                                       data-error="that email address is invalid"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="cnic"
                                       id="display_name"
                                       class="form-control input-md"
                                       placeholder="CNIC Number" tabindex="3"
                                       data-error="Username must be enetered"
                                       required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone"
                                       id="modallast_name"
                                       class="form-control input-md"
                                       placeholder="Customer Phone Number" tabindex="2"
                                       data-error="Last name must be entered"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                  <textarea class="form-control"
                                       placeholder="Address" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                  <textarea class="form-control"
                                       placeholder="Description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-12 col-sm-6 col-md-6">
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
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group row">
                                <!-- SELECT DROPDOWN -->
                                <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="select21" class="control-label">
                                            Select Status
                                        </label>
                                        <select id="" name="status" class="form-control select2" style="width:100%" required="">
                                            <option value="">Select value...</option>
                                            <!-- <optgroup label="Alaskan/Hawaiian Time Zone">
                                                
                                            </optgroup> -->
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <!-- END OF SELECT DROPDOWN -->
                            </div>
                            <input type="submit" id="btncheck" value="Add Customer"
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

<!-- EDIT MODAL FORM -->


                            <div class="table-responsive">
                                <table class="table table-striped table-bordered"   id="table2">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Father Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">CNIC</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                @foreach($customer as $obj)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->customer_id}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->name}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->father_name}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->email}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->cnic}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->phone}}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->address != null)
                                                {{$obj->address}}
                                                @else
                                                {{'-'}}
                                            @endif
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->description != null)
                                                {{$obj->description}}
                                                @else
                                                {{'-'}}
                                            @endif

                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->image != null)
                                                <img src="{{asset('storage/'.$obj->image)}}" width="70"></td>
                                                @else
                                                {{'-'}}
                                            @endif
                                        <td class="text-center" style="vertical-align: middle;">
                                            <span class="label label-lg <?php if($obj->status == 'Active') { echo 'bg-success'; } else { echo 'bg-danger'; } ?>" >{{$obj->status}}</span>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{date('d-m-Y', strtotime( $obj->date ))}}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <button class="btn btn-primary btn-xs edit_modal" data-toggle="modal" data-target="#formModalEdit{{$obj->customer_id}}" data-placement="top"><span class="fa fa-pencil"></span>
                                                <input type="hidden" id="customer_id_span" class="customer_id_span" value="{{$obj->customer_id}}">
                                            </button>
                                            
<!-- Modal -->
<div class="modal fade" id="formModalEdit{{$obj->customer_id}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Edit Customer</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">??
                </button>
            </div>
            <div class="modal-body">
                <form id="form-validation3" action="{{action('CustomerController@update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="customer_id" value="{{$obj->customer_id}}">
                                <input type="text" name="name"
                                       id="modalfirst_name"
                                       class="form-control input-md"
                                       placeholder="Customer Name" tabindex="1"
                                       data-error="First name must be entered"
                                       required value="{{$obj->name}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="father_name"
                                       id="modallast_name"
                                       class="form-control input-md"
                                       placeholder="Customer Father Name" tabindex="2"
                                       data-error="Last name must be entered"
                                       required value="{{$obj->father_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="email"
                                       class="form-control input-md"
                                       placeholder="Email Address" tabindex="4"
                                       data-error="that email address is invalid"
                                       required value="{{$obj->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="cnic"
                                       id="display_name"
                                       class="form-control input-md"
                                       placeholder="CNIC Number" tabindex="3"
                                       data-error="Username must be enetered"
                                       required value="{{$obj->cnic}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone"
                                       id="modallast_name"
                                       class="form-control input-md"
                                       placeholder="Customer Phone Number" tabindex="2"
                                       data-error="Last name must be entered"
                                       required value="{{$obj->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                  <textarea class="form-control"
                                       placeholder="Address" name="address">{{$obj->address}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                  <textarea class="form-control"
                                       placeholder="Description" name="description">{{$obj->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h5>Select Image</h5>
                                    <div class="">
                                        <input type="file" id="imgUpload2" name="image" class="dropify">
                                        <!-- <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong happended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" class="dropify"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-left">
                                <img id="imgPreview2" style="width: 100px !important;">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group row">
                                <!-- SELECT DROPDOWN -->
                                <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="select21" class="control-label">
                                            Select Status
                                        </label>
                                        <select id="select21" name="status" class="form-control select2" style="width:100%" required="">
                                            <option value="">Select value...</option>
                                            <!-- <optgroup label="Alaskan/Hawaiian Time Zone">
                                                
                                            </optgroup> -->
                                            <option @if($obj->status == 'Active') {{ 'selected' }} @endif value="Active">Active</option>
                                            <option @if($obj->status == 'Inactive') {{ 'selected' }} @endif value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <!-- END OF SELECT DROPDOWN -->
                            </div>
                            <input type="submit" id="btncheck" value="Update"
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

<!-- END OF EDIT MODAL FORM -->
                                            <a onclick="(new PNotify({
                                        title: 'Confirmation Needed',
                                        text: 'Are you sure?',
                                        icon: 'fa fa-question-circle',
                                        type:'success',
                                        hide: false,
                                        confirm: {
                                            confirm: true
                                        },
                                        buttons: {
                                            closer: false,
                                            sticker: false
                                        },
                                        history: {
                                            history: false
                                        }
                                    })).get().on('pnotify.confirm', function(){
                                        window.location.href = '{{action('CustomerController@delete')}}?customer_id={{$obj->customer_id}}';
                                    }).on('pnotify.cancel', function(){
                                        
                                    });" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table>
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

<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/dropify/js/dropify.js"></script>

<script src="{{asset('DashboardAssets')}}/js/custom_js/dropify_custom.js" type="text/javascript"></script>

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
<!-- <script src="{{asset('DashboardAssets')}}/js/custom_js/notifications.js"></script> -->
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
                title: 'Great! You have added a customer',
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