@extends('layouts.master_dashboard')

@section('master_body')

<!--page level css-->
<link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">

<link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom_css/invoice.css">
<!--end page level css-->

<aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Invoice</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item pt-1"><a href="index.html"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
					Invoice
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content p-l-r-15" id="invoice-stmt">
            <div class="card border-primary">
                <div class="card-header text-white bg-primary">
                    <h3 class="card-title d-inline">
                        <i class="fa fa-fw fa-credit-card"></i> Invoice
                    </h3>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 invoice_bg">
                                    <h4><img src="{{asset('DashboardAssets')}}/img/logoblue.png" alt="coreplus" class="m-l-40"/></h4>
                                    <h4><strong>Billing Details:</strong></h4>
                                    <address>
                                    	<strong>Customer Name:</strong>{{ $sale->customer->name }}
                                        <br> <strong>Father Name: </strong>{{ $sale->customer->father_name }}
                                        <br/> <strong>Phone:</strong>{{ $sale->customer->phone }}
                                        <br/> <strong>CNIC:</strong> {{ $sale->customer->cnic }}
                                        <br/> <strong>Address:</strong> {{ $sale->customer->address }}
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 invoice_bg text-right">
                                    <div class="pull-right">
                                    	<br>
                                        <h4><strong>#{{$sale->sale_id}} / 25 Sep 2016</strong></h4>
                                        <h4><strong>Invoice Info:</strong></h4>
                                        <address>
                                            <strong>Receiver Name:</strong>{{ $sale->receiver->name }}
	                                        <br> <strong>Father Name: </strong>{{ $sale->receiver->father_name }}
	                                        <br/> <strong>Phone:</strong>{{ $sale->receiver->phone }}
	                                        <br/> <strong>CNIC:</strong> {{ $sale->receiver->cnic }}
	                                        <br/> <strong>Address:</strong> {{ $sale->receiver->address }}
                                        </address>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed" id="customtable">
                                    <thead>
                                    <tr class="bg-primary text-white" style="background-color: #428BCA !important;">
                                        <th class="text-center">
                                            <strong>Item Name</strong>
                                        </th>
                                        <th class="text-center">
                                        	<strong>Category/Brand</strong>
                                        </th>
                                        <th class="text-center">
                                            <strong>Model</strong>
                                        </th>
                                        <th class="text-center">
                                            <strong>Year</strong>
                                        </th>
                                        <th class="text-center">
                                            <strong>Quantity</strong>
                                        </th>
                                        <th class="text-center">
                                            <strong>Selling Price</strong>
                                        </th>
                                        <th class="text-center">
                                            <strong>Profit</strong>
                                        </th>
                                        <th class="text-center">
                                        	<strong>Total</strong>
                                        </th>
                                        <th class="text-center" id="add_row"><i class="fa fa-fw fa-plus"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                    			 @foreach($sale->product_sale as $product_sale)
                                    <tr>
                                        <td class="text-center" contenteditable>
                                            {{ $product_sale->product->name }}
                                        </td>
                                        <td class="text-center" contenteditable>{{ $product_sale->product->category->name }}</td>
                                        <td class="text-center" contenteditable>
                                        	@if($product_sale->product->model != null)
                                        		{{ $product_sale->product->model }}
                                        		@else
                                        		{{ '-' }}
                                        	@endif
                                        </td>
                                        <td class="text-center" contenteditable>
                                        	@if($product_sale->product->year != null)
                                        		{{ $product_sale->product->year }}
                                        		@else
                                        		{{ '-' }}
                                        	@endif
                                        </td>
                                        <td class="text-center" contenteditable>
                                        	5
                                        </td>
                                        <td class="text-center">
                                        	{{ $product_sale->product->s_price }}
                                        </td>
                                        <td class="text-center" contenteditable>
                                        	{{ $product_sale->product->s_price - $product_sale->product->o_price }}
                                        </td>
                                        <td class="text-center" contenteditable>
                                        	{{ $product_sale->product->s_price }}
                                        </td>
                                        <td class="text-center row_delete"><i class="fa fa-fw fa-times"></i></td>
                                    </tr>
                                    @endforeach
                                    
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"></td>
                                        <td class="highrow text-center">
                                            <strong>
                                                Sub Total: &nbsp;
                                            </strong>
                                        </td>
                                        <td class="highrow text-center">
                                            <strong>$3638</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="highrow"></td>
                                        <td class="emptyrow text-center"></td>
                                        <td class="emptyrow text-center">
                                            <strong>
                                                Vat: &nbsp;
                                            </strong>
                                        </td>
                                        <td class="highrow text-center">
                                            <strong>$30</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow">
                                            <i class="livicon" data-name="barcode" data-size="60" data-loop="true"></i>
                                        </td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="highrow"></td>
                                        <td class="emptyrow text-center"></td>
                                        <td class="emptyrow text-center">
                                            <strong>
                                                Total: &nbsp;
                                            </strong>
                                        </td>
                                        <td class="highrow text-center">
                                            <strong>$3668</strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4><Strong>Terms and conditions:</Strong></h4>
                            <ul>
                                <li>An invoice must accompany products returned for warantty</li>
                                <li>Balance due within 10 days of invoice date,1.5% interest/month thereafter.</li>
                                <li>All goods returned for replacement/credit must be saleable condition with original
                                    packaging.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-section">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <span class="pull-right">
                                            <button type="button"
                                                    class="btn btn-responsive button-alignment btn-success"
                                                    data-toggle="button">
                                                <i class="fa fa-fw fa-money"></i> Pay Now
                                            </button>
                                             <button type="button"
                                                     class="btn btn-responsive button-alignment btn-primary"
                                                     data-toggle="button">
                                                <span style="color:#fff;" onclick="javascript:window.print();">
                                                    <i class="fa fa-fw fa-print"></i>
                                                Print
                                            </span>
                                </button>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div id="right">
                <div id="slim2">
                    <div class="rightsidebar-right">
                        <div class="rightsidebar-right-content">
                            <h5 class="rightsidebar-right-heading rightsidebar-right-heading-first text-uppercase text-xs">
                                <i class="menu-icon  fa fa-fw fa-paw"></i> Contacts
                            </h5>
                            <ul class="list-unstyled margin-none">
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar1.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Alanis
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Rolando
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar2.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Marlee
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar3.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-warning"></i> Marlee
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar4.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-danger"></i> Kamryn
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar5.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-muted"></i> Cielo
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar7.jpg" height="20" width="20"
                                             class="rounded-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-muted"></i> Charlene
                                    </a>
                                </li>
                            </ul>
                            <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                <i class="fa fa-fw fa-tasks"></i> Tasks
                            </h5>
                            <ul class="list-unstyled m-t-25">
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 1</strong>
                                            <small class="pull-right text-muted">
                                                40% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 40%">
                                                    <span class="sr-only">
                                                        40% Complete (success)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 2</strong>
                                            <small class="pull-right text-muted">
                                                20% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 20%">
                                                    <span class="sr-only">
                                                        20% Complete
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 3</strong>
                                            <small class="pull-right text-muted">
                                                60% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 60%">
                                                    <span class="sr-only">
                                                        60% Complete (warning)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 4</strong>
                                            <small class="pull-right text-muted">
                                                80% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                 aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 80%">
                                                    <span class="sr-only">
                                                        80% Complete (danger)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                <i class="fa fa-fw fa-group"></i> Recent Activities
                            </h5>
                            <div>
                                <ul class="list-unstyled">
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-comment fa-fw text-primary"></i> New Comment
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-twitter fa-fw text-success"></i> 3 New Followers
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-envelope fa-fw text-info"></i> Message Sent
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-tasks fa-fw text-warning"></i> New Task
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-upload fa-fw text-danger"></i> Server Rebooted
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-warning fa-fw text-primary"></i> Server Not Responding
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart fa-fw text-success"></i> New Order Placed
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-money fa-fw text-info"></i> Payment Received
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right side bar end -->
        </section>
        <!-- /.content -->
    </aside>

<!-- global js -->
<script src="{{asset('DashboardAssets')}}/js/app.js" type="text/javascript"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/js/custom_js/invoice.js"></script>
<!-- end of page level js -->

@endsection