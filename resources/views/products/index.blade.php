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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List of All Products
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{action('MainController@dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active">
                    Products
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
                                <i class="fa fa-fw fa-users"></i> All Products
                            </h3>
                        </div>
                        <div class="card-body">
                        	<span class="btn btn-success float-right mr-3" data-toggle="modal" data-target="#formModal">
	                            <i class="fa fa-plus"></i>
	                            <span>Add Product</span>
                            </span>

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
                           <div class="form-group">
                                <label for="select21" class="control-label">
                                    Select Discount
                                </label>
                                <select id="" name="discount_id" class="form-control select2" style="width:100%" >
                                    <option value="">Select value...</option>
                                    
                                    @foreach($discount as $obj)
                                    <option value="{{ $obj->discount_id }}" >{{ $obj->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="select21" class="control-label">
                                        Select Category
                                    </label>
                                    <select id="" name="category_id" class="form-control select2" style="width:100%" required="">
                                        <option value="">Select value...</option>
                                        @foreach($category as $obj)
                                            <option value="{{$obj->category_id}}">{{$obj->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
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
                        <div class="col-12 col-sm-6 col-md-6">
                            <label for="select21" class="control-label">
                                            Is this product featured?
                            </label>
                            <br>
                            <input type="checkbox" name="is_featured" class="form-control">
                            <label for="select21" class="control-label ml-2">
                                Feature
                            </label>
                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
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

<!-- EDIT MODAL FORM -->


                            <div class="table-responsive">
                                <table class="table table-striped table-bordered"   id="table2">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="vertical-align: middle;">Id</th>
                                        <th class="text-center" style="vertical-align: middle;">Name</th>
                                        <th class="text-center" style="vertical-align: middle;">Category</th>
                                        <th class="text-center" style="vertical-align: middle;">Description</th>
                                        <th class="text-center" style="vertical-align: middle;">Model / Year</th>
                                        <th class="text-center" style="vertical-align: middle;">Featured</th>
                                        <th class="text-center" style="vertical-align: middle;">Discount</th>
                                        <th class="text-center" style="vertical-align: middle;">Stock Available </th>
                                        <th class="text-center" style="vertical-align: middle;">Stock Sold</th>
                                        <th class="text-center" style="vertical-align: middle;">Original Price</th>
                                        <th class="text-center" style="vertical-align: middle;">Selling Price</th>
                                        <th class="text-center" style="vertical-align: middle;">Profit</th>
                                        <th class="text-center" style="vertical-align: middle;">Image</th>
                                        <th class="text-center" style="vertical-align: middle;">Status</th>
                                        <th class="text-center" style="vertical-align: middle;">Date</th>
                                        <th class="text-center" style="vertical-align: middle;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                @foreach($product as $obj)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->product_id}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->name}}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{$obj->category->name}}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->description != null)
                                                {{$obj->description}}
                                                @else
                                                {{'-'}}
                                            @endif
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->model != null)
                                                {{$obj->model}} /
                                            @endif
                                            @if($obj->year != null)
                                                {{$obj->year}}
                                                @else
                                                {{'-'}}
                                            @endif
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->is_featured != null)
                                                {{'Yes'}}
                                                @else
                                                {{'No'}}
                                            @endif
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->discount_id != null)
                                                {{$obj->discount->name }}
                                                @else
                                                {{'-'}}
                                            @endif
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{ $obj->stock }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{ $obj->stock_sold }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{ $obj->o_price }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{ $obj->s_price }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{ $obj->s_price - $obj->o_price }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($obj->image != null)
                                                <img src="{{asset('storage/'.$obj->image)}}" width="70">
                                                @else
                                                {{'-'}}
                                            @endif
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <span class="label label-lg <?php if($obj->status == 'Active') { echo 'bg-success'; } else { echo 'bg-danger'; } ?>" >{{$obj->status}}</span>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{date('d-m-Y', strtotime( $obj->date ))}}
                                        </td>
                                        <td class="" style="vertical-align: middle;">
                                            <button class="btn btn-primary btn-xs edit_modal" data-toggle="modal" data-target="#formModalEdit{{$obj->product_id}}" data-placement="top"><span class="fa fa-pencil"></span>
                                            </button>
                                            
<!-- Modal -->
<div class="modal fade" id="formModalEdit{{$obj->product_id}}" tabindex="-1" role="dialog"
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
                <form id="form-validation3" action="{{action('ProductController@update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="product_id" value="{{$obj->product_id}}">
                                <input type="text" name="name"
                                       id="modalfirst_name"
                                       class="form-control input-md"
                                       placeholder="Product Name" tabindex="1"
                                       data-error="First name must be entered"
                                       required value="{{$obj->name}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="model"
                                       class="form-control input-md"
                                       placeholder="Model" tabindex="4"
                                       value="{{$obj->model}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="year"
                                       class="form-control input-md"
                                       placeholder="Year" tabindex="4"
                                       value="{{$obj->year}}">
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="o_price"
                                       class="form-control input-md"
                                       placeholder="Original Price" tabindex="3"
                                       required value="{{$obj->o_price}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="stock"
                                       class="form-control input-md"
                                       placeholder="Stock Available" tabindex="3"
                                       required value="{{$obj->stock}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="s_price"
                                       class="form-control input-md"
                                       placeholder="Selling Price" tabindex="3"
                                       required value="{{$obj->s_price}}">
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
                           <div class="form-group">
                                <label for="select21" class="control-label">
                                    Select Discount
                                </label>
                                 <select id="" name="discount_id" class="form-control select2" style="width:100%" >
                                    <option value="">Select value...</option>
                                    
                                    @foreach($discount as $dis)
                                    <option @if($obj->discount_id == $dis->discount_id) {{ 'selected' }} @endif value="{{ $dis->discount_id }}" >{{ $dis->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="select21" class="control-label">
                                        Select Category
                                    </label>
                                    <select id="" name="category_id" class="form-control select2" style="width:100%" required="">
                                        <option value="">Select value...</option>
                                        @foreach($category as $cat)
                                            <option @if($obj->category_id == $cat->category_id) {{ 'selected' }} @endif value="{{$cat->category_id}}">{{$cat->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <label for="select21" class="control-label">
                                            Select Status
                            </label>
                            <select id="" name="status" class="form-control select2" style="width:100%" required="">
                                <option value="">Select value...</option>
                                <!-- <optgroup label="Alaskan/Hawaiian Time Zone">
                                    
                                </optgroup> -->
                                <option @if($obj->status == 'Active') {{ "selected" }} @endif value="Active">Active</option>
                                <option @if($obj->status == 'Inactive') {{ "selected" }} @endif value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <label for="select21" class="control-label">
                                            Is this product featured?
                            </label>
                            <br>
                            <input type="checkbox" @if($obj->is_featured == 'on') {{ 'checked' }} @endif name="is_featured" class="form-control">
                            <label for="select21" class="control-label ml-2">
                                Feature
                            </label>
                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <h5>Select Image</h5>
                                <div class="">
                                    <input type="file" id="imgUpload2" name="image" class="dropify">
                                    <!-- <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong happended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" class="dropify"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div> -->
                                </div>
                                <br>
                                <img id="imgPreview2" style="width: 100px !important;">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <br>
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
                                        window.location.href = '{{action('ProductController@delete')}}?product_id={{$obj->product_id}}';
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
                title: 'Great! You have added a product',
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

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>