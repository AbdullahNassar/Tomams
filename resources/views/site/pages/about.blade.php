@extends('site.layouts.master')
@section('content')
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="">
                                <i class="fa fa-info"></i>
                            </a>
                        </li>
                        <li><a href="">About Us</a></li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">       
                    <div class="container">
                        <div class="item-box">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="title-md">About Us </h3>
                                    <p class="section-txt">
                                        {{$data->get('about_en')}}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="title-md">Our Features</h3>   
                                    <ul class="true-list">
                                        @php
                                        $features_en = json_decode($data->get('features_en'));
                                        @endphp
                                        @foreach((array)$features_en as $f_en)
                                        <li>{{$f_en}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div><!--End row-->
                            <div class="spacer-xl"></div>
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="icon-box">
                                        <div class="feature-icon">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <h3>Our Goals</h3>
                                        <p>
                                           {{$data->get('goal_en')}}
                                        </p>
                                    </div>
                                </div><!-- End col-md-4-->
                                <div class="col-md-4">
                                    <div class="icon-box">
                                        <div class="feature-icon">
                                            <i class="fa fa-wpforms"></i>
                                        </div>
                                        <h3>Our Message</h3>
                                        <p>
                                           {{$data->get('message_en')}}
                                        </p>
                                    </div>
                                </div><!-- End col-md-4-->
                                <div class="col-md-4">
                                    <div class="icon-box">
                                        <div class="feature-icon">
                                            <i class="fa fa-bullhorn"></i>
                                        </div>
                                        <h3>Our Vision</h3>
                                        <p>
                                            {{$data->get('vision_en')}}
                                        </p>
                                    </div>
                                </div><!-- End col-md-4-->
                            </div>
                        </div><!--End Item-Box-->
                    </div><!--End container -->
                </div><!--End Page Content-->
@endsection