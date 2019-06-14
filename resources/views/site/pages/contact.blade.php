@extends('site.layouts.master')
@section('content')
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.home')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            Contact Us
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">       
                    <div class="container">
                        <div class="item-box">
                            <div class="row">
                                <div class="col-md-8">
                                    <form id="contact-form" action="{{route('site.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input name="name" class="form-control" placeholder="Full Name" type="text">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <input name="phone" class="form-control" placeholder="Phone Number" type="text">
                                            </div><!--End col-md-6-->
                                        </div><!--End row-->
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input name="email" class="form-control" placeholder=" Email Address" type="email">
                                            </div><!--End col-md-12-->
                                        </div><!--End row-->
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <textarea name="message" rows="7" class="form-control" placeholder="Your Message"></textarea>
                                            </div>    
                                        </div><!--End row-->
                                        <button class="custom-btn addBTN" type="submit">
                                            Contact Us
                                        </button>
                                    </form>
                                </div><!--End col-md-8-->
                                <div class="col-md-4">
                                    <div class="contact-info">
                                        <div class="contact-info-item">
                                            <span>
                                                <i class="fa fa-mobile"></i>
                                                Phone :
                                            </span>
                                            <span>{{$contact->get('phone')}}</span>
                                        </div><!--End contact-info-item-->
                                        <div class="contact-info-item">
                                            <span>
                                                <i class="fa fa-whatsapp"></i>
                                                Whatsapp:
                                            </span>
                                            <span>{{$contact->get('whats')}}</span>
                                        </div><!--End contact-info-item-->
                                        <div class="contact-info-item">
                                            <span>
                                                <i class="fa fa-envelope-o"></i>
                                                Email:
                                            </span>
                                            <span>{{$contact->get('email')}}</span>
                                        </div><!--End contact-info-item-->
                                        <div class="contact-info-item">
                                            <span>
                                                <i class="fa fa-map-marker"></i>
                                                Address :
                                            </span>
                                            <span>{{$contact->get('address_en')}}</span>
                                        </div><!--End contact-info-item-->
                                    </div><!--End contact-info-->
                                </div><!--End col-md-4-->
                            </div><!--End row-->
                        </div><!--End Item-Box-->
                    </div><!--End container -->
                </div><!--End Page Content-->
@endsection