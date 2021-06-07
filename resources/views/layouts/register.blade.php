
<!DOCTYPE html>
<html>


<!-- Mirrored from coreplusdemo.lorvent.com/register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 May 2021 12:35:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>::Admin Register::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="shortcut icon" href="{{asset('DashboardAssets')}}/img/favicon.ico"/>
    <!-- global css -->
    <link href="{{asset('DashboardAssets')}}/css/app.css" rel="stylesheet">
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/iCheck/css/all.css"/>
    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/select2/css/select2.min.css"/>
    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/select2/css/select2-bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">
    <link href="{{asset('DashboardAssets')}}/css/login.css" rel="stylesheet">
    <!--end of page level css-->

    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/blueimpgallery/css/blueimp-gallery.min.css"/>
    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/dropify/css/dropify.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom_css/dropify.css">
    <!--end of page level css-->
</head>

<body>
<div class="preloader">
    <div class="loader_img"><img src="{{asset('DashboardAssets')}}/img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row " id="form-login">
        <div class="col-sm-12">
            <div class="card-header nocolor">
                <h2 class="text-center text-primary">
                    Sign Up or
                    <a href="{{action('MainController@login')}}">Log In</a>
                </h2>
            </div>
            <div class="card-body social">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 offset-2">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            <!-- CSRF Token -->
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-sm-3" for="first_name">{{ __('Name') }}<sup>*</sup> :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"> <i class="fa fa-fw fa-user-md text-primary"></i>
                                        </span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                               id="first_name"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group row ">
                                <label class="control-label col-sm-3" for="last_name">Last Name<sup>*</sup>  :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                               id="last_name" value=""/>
                                        <span class="input-group-addon"> <i class="fa fa-fw fa-user-md text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group row ">
                                <label class="control-label col-sm-3" for="email">{{ __('E-Mail Address') }}<sup>*</sup>  :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope text-primary"></i>
                                        </span>
                                        <input type="text" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group row ">
                                <label class="control-label col-sm-3" for="email_confirm">Confirm Email<sup>*</sup>  :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope text-primary"></i>
                                        </span>
                                        <input type="text" placeholder="Confirm Email Address" class="form-control"
                                               name="email_confirm" id="email_confirm" value=""/>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group row ">
                                <label class="control-label col-sm-3" for="password">{{ __('Password') }}<sup>*</sup>  :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-text rounded-0">
                                            <i class="fa fa-fw fa-key text-primary"></i>
                                        </span>
                                        <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password"/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-sm-3" for="password_confirm">{{ __('Confirm Password') }}<sup>*</sup>  :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="password" placeholder="Confirm Password" class="form-control"
                                               name="password_confirmation" id="password_confirm" required autocomplete="new-password"/>
                                        <span class="input-group-text rounded-0">
                                            <i class="fa fa-fw fa-key text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="phone">Phone<sup>*</sup>  :</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-text rounded-0">
                                            <i class="fa fa-fw fa-phone text-primary"></i>
                                        </span>
                                        <input type="text" maxlength="11" placeholder="Phone Number" class="form-control" name="phone"
                                               id="phone"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="phone">Select your Image<sup></sup>  :</label>
                                <div class="col-md-8">
                                   <input type="file" class="dropify" >
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label class="control-label col-3 col-sm-3 col-md-3 col-lg-3">Gender:</label>
                                <div class=" col-4 col-lg-2 col-md-2 col-sm-4 mar-top4">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" class="flat-red" id="radio_d1" value="male"/> Male
                                    </label>
                                </div>
                                <div class="col-md-2 col-5 col-md-4 col-sm-3 mar-top4">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" class="flat-red " id="radio_d2" value="female"/>
                                        Female
                                    </label>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <div class="offset-sm-3 col-12 col-md-9 agree">
                                    <label class="checkbox-inline sr-only d-block"  for="terms">Agree to terms and conditions</label>
                                    <input type="checkbox" value="1" name="terms" id="terms" required="" /> &nbsp;
                                    <label for="terms" class="agree "> I agree to Terms and Conditions.</label>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="offset-sm-3 col-9">
                                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                    <input type="reset" class="btn btn-default" value="Reset" id="dee1"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{asset('DashboardAssets')}}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/js/bootstrap.min.js" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js -->
<script src="{{asset('DashboardAssets')}}/vendors/moment/js/moment.min.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/select2/js/select2.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/iCheck/js/icheck.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/js/custom_js/register2.js"></script>
<!-- end of page level js -->
<!-- global js -->

<script src="{{asset('DashboardAssets')}}/js/app.js" type="text/javascript"></script>

<!-- end of global js -->

<!-- begining of page level js -->

<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/dropify/js/dropify.js"></script>

<script src="{{asset('DashboardAssets')}}/js/custom_js/dropify_custom.js" type="text/javascript"></script>

<!-- end of page level js -->


</body>


<!-- Mirrored from coreplusdemo.lorvent.com/register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 May 2021 12:35:38 GMT -->
</html>
