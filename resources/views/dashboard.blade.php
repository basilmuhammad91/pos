@extends('layouts.master_dashboard')
@section('master_body')

<aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="index-header">
                <div class="inner-bg inner-bg1">
                    <div class="header-section">
                        <div class="row">
                            <div class="col-xl-6 col-md-4 col-lg-4 d-none d-lg-block mt-2">
                                <h1>Welcome <span class="d-none d-xl-inline-block">To Dashboard</span></h1>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8 col-xl-6 welcome">
                                <div class="row text-center">
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 ">
                                        <h2>
                                            <strong>97.3k</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-thumbs-o-up"></i>
                                                Great
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 ">
                                        <h2 class="animation-hatch">
                                            <strong>197k</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-heart-o"></i>
                                                Likes
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 pl-0 pl-md-3 pl-lg-3 pl-xl-3">
                                        <h2 class="animation-hatch">
                                            <strong>211</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-calendar-o"></i>
                                                Events
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3 col-4 d-none d-md-block">
                                        <h2 class="animation-hatch">
                                            <strong>28°C</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-map-marker"></i>
                                                Canada
                                            </small>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section ends-->
        <section class="content sec-mar">
            <div class="row">
                <div class="col-md-12">
                    <div class="row tiles-row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                            <div class="canvas-interactive-wrapper1">
                                <canvas id="canvas-interactive1"></canvas>
                                <div class="cta-wrapper1">
                                    <div class="widget" data-count=".num" data-from="0"
                                         data-to="99.9" data-suffix="%" data-duration="2">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-fw fa-shopping-cart fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="count-box" class="count-box">{{ $total_today_sale }}</div>
                                                <span class="title">Today Sales</span>
                                            </div>
                                            <div class="text-center">
                                                <span><i class="fa fa-level-up" aria-hidden="true"></i></span>
                                                <strong>12 more Sales</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                            <div class="widget" data-count=".num" data-from="0"
                                 data-to="512" data-duration="3">
                                <div class="canvas-interactive-wrapper2">
                                    <canvas id="canvas-interactive2"></canvas>
                                    <div class="cta-wrapper2">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-fw fa-paw fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="" class="count-box">{{ $total_customer }}</div>
                                                <span class="title">Total Customers</span>
                                            </div>
                                            <div class="text-center">
                                                <span><i class="fa fa-level-up" aria-hidden="true"></i></span>
                                                <strong>60 Bounce Rate</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                            <div class="widget" data-suffix="k" data-count=".num"
                                 data-from="0" data-to="310" data-duration="4" data-easing="false">
                                <div class="canvas-interactive-wrapper3">
                                    <canvas id="canvas-interactive3"></canvas>
                                    <div class="cta-wrapper3">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-fw fa-usd fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="" class="count-box">{{ $total_profit }}</div>
                                                <span class="title">Total Profit</span>
                                            </div>
                                            <div class="text-center">
                                                <span><i class="fa fa-level-up" aria-hidden="true"></i></span>
                                                <strong>120 more income</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                            <div class="widget">
                                <div class="canvas-interactive-wrapper4">
                                    <canvas id="canvas-interactive4"></canvas>
                                    <div class="cta-wrapper4">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-bar-chart-o fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="" class="count-box">{{ $total_sale }}</div>
                                                <span class="title">Total Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                            <div class="widget" style="background-color: #48CFAE">
                                <div class="canvas-interactive-wrapper4">
                                    <canvas id="canvas-interactive5" style="position: absolute;
    display: block;
    top: 0;
    bottom: 0;
    border-radius: 5px;
    height: 135px;
    width: 100%;"></canvas>
                                    <div class="cta-wrapper4">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-bar-chart-o fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="" class="count-box">{{ $total_products }}</div>
                                                <span class="title">Active Products</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </section>

        <!-- /.content --> 
    </aside>

@endsection