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
<link href="{{asset('DashboardAssets')}}/vendors/clockface/css/clockface.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('DashboardAssets')}}/vendors/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('DashboardAssets')}}/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('DashboardAssets')}}/vendors/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('DashboardAssets')}}/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('DashboardAssets')}}/vendors/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('DashboardAssets')}}/vendors/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">

<link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/pickers.css">
<!--end of page level css-->

<!--page level css -->
	<link rel="stylesheet" href="vendors/toolbar/css/jquery.toolbar.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

	<link type="text/css" href="css/tab.css" rel="stylesheet">
<!--end of page level css-->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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

    .invoice
    {
        border: solid 1px gray;
        height: 30em; 
        overflow: scroll;
    }

    .sub-invoice
    {
        background-color: #def0ff
    }

</style>

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Generate Sales
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{action('MainController@dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active">
                    Generate Sales
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
                                <i class="fa fa-fw fa-users"></i> Generate Sales
                            </h3>
                        </div>
                        <div class="card-body text-center">
                        	<div class="row">
                             <div class="col-md-9">
                                @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager')
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="btn btn-success float-right mr-3" data-toggle="modal" data-target="#formModal">
                                            <i class="fa fa-plus"></i>
                                            <span>Add Product</span>
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
                <h4 class="modal-title mt-0" id="myModalLabel">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-validation3" action="{{action('ProductController@submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="name"
                                       id="modalfirst_name"
                                       class="form-control input-md"
                                       placeholder="Product Name" tabindex="1"
                                       data-error="First name must be entered"
                                       required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="model"
                                       class="form-control input-md"
                                       placeholder="Model" tabindex="4"
                                       >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="year"
                                       class="form-control input-md"
                                       placeholder="Year" tabindex="4"
                                       >
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="o_price"
                                       class="form-control input-md"
                                       placeholder="Original Price" tabindex="3"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="stock"
                                       class="form-control input-md"
                                       placeholder="Stock Available" tabindex="3"
                                       required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="s_price"
                                       class="form-control input-md"
                                       placeholder="Selling Price" tabindex="3"
                                       required>
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
                           <div class="form-group text-left">
                                <label for="select21" class="control-label">
                                    Select Discount
                                </label>
                                <select id="" name="discount_id" class="form-control select2" style="width:100%" >
                                    <option value="">Select value...</option>

                                    @foreach($discount as $dis)
                                        <option value="{{ $dis->discount_id }}">{{ $dis->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group text-left">
                                <div class="form-group">
                                    <label for="select21" class="control-label">
                                        Select Category
                                    </label>
                                    <select id="" name="category_id" class="form-control select2" style="width:100%" required="">
                                        <option value="">Select value...</option>
                                        @foreach($all_category as $obj)
                                            <option @if($obj->category_id == $category->category_id) {{ 'selected' }} @endif value="{{$obj->category_id}}">{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 text-left">
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
                        <div class="col-12 col-sm-6 col-md-6 text-left">
                            <label for="select21" class="control-label">
                                            Is this product featured?
                            </label>
                            <br>
                            <input type="checkbox" name="is_featured" class="form-control text-left">
                            <label for="select21" class="control-label ml-2 text-left">
                                Feature
                            </label>
                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 text-left">
                            <h5>Select Image</h5>
                                <div class="">
                                    <input type="file" id="imgUpload" name="image" class="dropify">
                                    <!-- <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong happended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" class="dropify"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div> -->
                                </div>
                                <br>
                                <img id="imgPreview" style="width: 100px !important;">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <br>
                            <input type="submit" id="btncheck" value="Add Product"
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
                                    @foreach($category->product->where('status','Active') as $obj)
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 text-center mb-3 mt-5">
                                        <div class="text-center" style="margin: auto;">
                                            <div class="box px-3 py-3" style="background-color: #428BCA; border-radius: 0.6em; box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); cursor: pointer;" id="add_product_{{ $obj->product_id }}" onclick="myFunction('{{$obj->name}}', {{$obj->product_id }}, {{ $obj->s_price }});" >
                                                <h6 style="color: white; text-transform: uppercase; background-color: 2c6ea8; padding: 1px 1px; background-color: 2c6ea8; border-radius: 0.3em 0.3em 0 0; margin: 0; ">{{ $obj->category->name }}</h6>
                                                <div class="sub-box px-4 py-4" style="background-color: white; margin-bottom: 0.9em; box-shadow: inset 0 0 4px #000000; ">
                                                    
                                                    @if($obj->image != null)

                                                    <img src="{{asset('storage/'.$obj->image)}}" width="60"></td>

                                                    @else
                                                    <img src="{{asset('DashboardAssets')}}/img/category-icon.png" class="img-fluid" width="60">

                                                    @endif

                                                </div>
                                                <h6 style="color: white; margin-top: 1em; text-transform: uppercase; background-color: 2c6ea8; padding: 1px 1px; background-color: 2c6ea8; border-radius: 0.3em">{{ $obj->name }} - {{ $obj->s_price }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                             </div>   

                            <div class="col-md-3">
                                <form method="post" action="{{action('SaleController@generate_sales')}}">
                                    @csrf
                                <div class="invoice" id="invoice">
                                </div>
                                <br>
                                <div class="row px-3 py-2">
                                    <div class="col-md-12" style="background-color: #428BCA; color: white; ">
                                        <h4>GRAND TOTAL: <strong><b><input type="hidden" name="grand_total_input" value="" id="grand_total_input"><span id="grand_total"></span></b></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <label class="">Customers</label>
                                        <div class="form-group">
                                            <select name="customer_id" class="form-control js-example-basic-single select2">
                                                <option value="">Select Customer</option>
                                                @foreach($customers as $obj)
                                                    <option value="{{ $obj->customer_id }}">{{ $obj->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <label>Receivers</label>
                                        <div class="form-group">
                                            <select name="receiver_id" class="form-control js-example-basic-single select2">
                                                <option value="">Select Receiver</option>
                                                @foreach($customers as $obj)
                                                    <option value="{{ $obj->customer_id }}">{{ $obj->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <label class="">Amount Received</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="paid" id="amount_paid">
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <label>Remaining</label>
                                        <input type="number" name="" class="form-control" disabled="true" style="background: transparent;" id="remaining">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-default col-12" style="color: black; ">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary col-12" style="color: white; ">Pay Now</button>
                                    </div>
                                </div>

                             </div>
                                </form>
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

<!-- begining of page level js -->
<script src="{{asset('DashboardAssets')}}/vendors/iCheck/js/icheck.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/bootstrap-fileinput/js/fileinput.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/bootstrap-fileinput/js/theme.js">  </script>
<script src="{{asset('DashboardAssets')}}/js/custom_js/form_elements.js"></script>
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


<script type="text/javascript">
    var myArr = [];
    var grand_total = 0;
    function myFunction(name, id, unit_price)
    {
        var isExist = false;
        myArr.forEach(function(item){
            if(item.id == id)
            {
                item.quantity++;
                isExist = true;
            }
        });

        if(!isExist)
        {
            var obj = new Object();
            obj.id = id;
            obj.quantity = 1;
            obj.price = unit_price;
            obj.name = name;
            myArr.push(obj);
        }

        create_invoice_div();
        document.getElementById('grand_total').innerHTML = grand_total;
        document.getElementById('grand_total_input').value = grand_total;

        grand_total =0;

    }

    function create_invoice_div()
    {
        var invoice_div = document.getElementById('invoice');
        invoice_div.innerHTML='';
        myArr.forEach(function(item){
            grand_total += item.price*item.quantity;
            // invoice_div.innerHTML += item.id+" - "+item.quantity+" - "+item.price+" - "+item.quantity*item.price+"<br>";
            invoice_div.innerHTML += '<div class="row sub-invoice text-left mx-2 my-2 px-1 py-2" id="invoice-row"><div class="col-12"></div><div class="col-8 mt-2"><b><h4>'+item.name+'</h4><input type="hidden" name="product_id[]" value="'+item.id+'" /></b></div><div class="col-4 text-right"><span class="float-right close_btn" id="close_btn" style="cursor: pointer;"><i class="fa fa-fw fa-times-circle"></i></span><br><h5 style="margin: 0; padding: 0; ">'+item.quantity*item.price+'</h5></div><div class="col-12"><span><i class="fa fa-fw fa-plus-circle increase_quantity"></i> <span class="quantity_value">'+item.quantity+'</span><input type="hidden" name="quantity[]" value="'+item.quantity+'" /> Unit(s) </span><span class="mr-3"><i class="fa fa-fw fa-minus-circle"></i>'+item.price+'  per unit</span><input type="hidden" name="price[]" value="'+item.quantity*item.price+'" /></div></div>';
        });
    }

    $(document).ready(function() {  
        $('.js-example-basic-single').select2();
    });

    $(document).ready(function(){
    $('#amount_paid').keyup(function(){
        var amount_paid = $('#amount_paid').val();
        var grand_total_input = $('#grand_total_input').val();

        $('#remaining').val(grand_total_input-amount_paid);

        if(amount_paid == 0)
        {
            $('#remaining').val();
        }
    })
});

</script>