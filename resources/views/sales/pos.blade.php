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

<!--page level css -->
	<link rel="stylesheet" href="vendors/toolbar/css/jquery.toolbar.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

	<link type="text/css" href="css/tab.css" rel="stylesheet">
<!--end of page level css-->

<style type="text/css">
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
                                <div class="row">
<script type="text/javascript">
     var cart = [];
     var count = 0;
     var grand_total = 0;


</script>
                                    @foreach($category->product as $obj)
                                    <div class="col-md-3 col-lg-2 col-sm-4 text-center mb-3 mt-5">
                                        <div class="text-center" style="margin: auto;">
                                            <div class="box px-3 py-3" style="background-color: #428BCA; border-radius: 0.6em; box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); cursor: pointer;" id="add_product_{{ $obj->product_id }}" >
                                                <h6 style="color: white; text-transform: uppercase; background-color: 2c6ea8; padding: 0.1em 2em; background-color: 2c6ea8; border-radius: 0.3em 0.3em 0 0; margin: 0; ">{{ $obj->category->name }}</h6>
                                                <div class="sub-box px-4 py-4" style="background-color: white; margin-bottom: 0.9em; box-shadow: inset 0 0 4px #000000; ">
                                                    
                                                    @if($obj->image != null)

                                                    <img src="{{asset('storage/'.$obj->image)}}" width="60"></td>

                                                    @else
                                                    <img src="{{asset('DashboardAssets')}}/img/category-icon.png" class="img-fluid" width="60">

                                                    @endif

                                                </div>
                                                <h6 style="color: white; margin-top: 1em; text-transform: uppercase; background-color: 2c6ea8; padding: 0.1em 2em; background-color: 2c6ea8; border-radius: 0.3em">{{ $obj->name }} - {{ $obj->s_price }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
    $(document).ready(function(){
var qty_{{ $obj->product_id }} = 0;

        $('#add_product_{{ $obj->product_id }}').click(function(){
            grand_total += <?php echo $obj->s_price ?>;
            cart.push("{{ $obj->product_id }}");
                $("#invoice").append('<div class="row sub-invoice text-left mx-2 my-2 px-1 py-2" id="invoice-row"><div class="col-12"></div><div class="col-8 mt-2"><b><h4>{{ $obj->name }}</h4></b></div><div class="col-4 text-right"><span class="float-right close_btn" id="close_btn" style="cursor: pointer;"><i class="fa fa-fw fa-times-circle"></i></span><br><h5 style="margin: 0; padding: 0; ">$200</h5></div><div class="col-12"><span id="qty_plus_{{ $obj->product_id }}"><i class="fa fa-fw fa-plus-circle"></i> <span id="qty_{{ $obj->product_id }}"></span> Unit(s) </span><span class="mr-3"><i class="fa fa-fw fa-minus-circle"></i> {{ $obj->s_price }} per unit</span></div></div>');
            });
        });

        $('#qty_plus_{{ $obj->product_id }}').click(function(){
            qty_{{ $obj->product_id }}++;
            document.getElementById("qty_plus_{{ $obj->product_id }}").textContent="newtext";
            
        });

    count++;
</script>
                                    @endforeach
                                </div>
                             </div>   

                             <div class="col-md-3">
                                <div class="invoice" id="invoice">
                                    <!-- <div class="row sub-invoice text-left mx-2 my-2 px-1 py-2" id="invoice-row">
                                        <div class="col-12">
                                            
                                        </div>
                                        <div class="col-8 mt-2">
                                            <b><h4>Honda</h4></b>
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="float-right close_btn" id="close_btn" style="cursor: pointer;"><i class="fa fa-fw fa-times-circle"></i></span>
                                            <br>
                                            <h5 style="margin: 0; padding: 0; ">$200</h5>
                                        </div>
                                        <div class="col-12">
                                            <span><i class="fa fa-fw fa-plus-circle"></i>1 Unit(s)</span>
                                            <span class="ml-2"><i class="fa fa-fw fa-money"></i> $100 per unit</span>
                                        </div>
                                    </div> -->
                                </div>
                                <br>
                                <div class="row px-3 py-2">
                                    <div class="col-md-12" style="background-color: #428BCA; color: white; ">
                                        <h4>GRAND TOTAL: <strong><b><script type="text/javascript">document.write(grand_total); </script></b></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <label class="">Discount</label>
                                        <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo3" type="text" value="" name="demo3" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <label>Tax</label>
                                        <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo3" type="text" value="" name="demo3" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
                                    </div>
                                </div>
<br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-default col-12" style="color: black; ">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary col-12" style="color: white; ">Pay Now</button>
                                    </div>
                                </div>

                             </div>

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

