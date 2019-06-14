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
                            Blog Page
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">       
                    <div class="container">
                        <div class="row">
                            @foreach($post as $p)
                            <div class="col-md-6">
                                <a class="blog-item" href="{{ route('site.post' , ['id' => $p->id]) }}">
                                    <div class="blog-thumb image-hover">
                                        <img src="{{asset('storage/uploads/posts').'/'.$p->image}}">
                                    </div><!--End blog-thumb-->
                                    <div class="blog-cont">
                                        <h2 class="blog-title">
                                            {{$p->title_en}}
                                        </h2>
                                        <div class="blog-author">
                                            By
                                            <span>{{$p->name}}</span>
                                            at 
                                            <span>{{$p->created_at}}</span>
                                        </div>
                                        <p>
                                            {{$p->head_en}}
                                        </p>
                                    </div><!--End blog-cont-->
                                </a><!--End blog-item-->
                            </div><!--End col-md-6-->
                            @endforeach
                        </div>
                    </div><!--End container-->
                </div><!--End Page Content-->
@endsection