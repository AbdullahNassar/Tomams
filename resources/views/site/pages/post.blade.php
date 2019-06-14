@extends('site.layouts.master')
@section('content')
@foreach($post as $p)
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.home')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            Blog Item Page
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="blog-page">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="single-post">
                                        <div class="image-hover">
                                            <img src="{{asset('storage/uploads/posts').'/'.$p->image}}" class="image-hover">
                                        </div>
                                        <div class="single-post-cont">
                                            <h3>{{$p->title_en}}</h3>
                                            <div class="single-post-info">
                                                <span class="author">
                                                    <i class="fa fa-user"></i>
                                                    {{$p->name}}
                                                </span>
                                                <span class="date">
                                                    <i class="fa fa-user"></i>
                                                    {{$p->created_at}}
                                                </span>
                                            </div><!--End single-post-info-->
                                            <div class="blog-content">
                                                <p>
                                                    {{$p->content_en}}
                                                </p>
                                            </div><!--End blog-content-->
                                            <div class="blog-share">
                                                <span> share post:</span>
                                                <ul class="social-list">
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-rss"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-google-plus"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!--End blog-share-->
                                        </div><!--End single-post-cont-->
                                    </div><!--End single-post-->
                                </div><!--End col-md-9-->
                                <div class="col-md-3">
                                    <aside class="widget-wrap">
                                        <div class="widget-search">
                                            <div class="widget-content">
                                                <form method="GET" action="{{route('blog.search')}}">
                                                    <input name="search" placeholder="Search For.." type="text">
                                                    <button type="submit"><i class="fa fa-search"></i></button> 
                                                </form>
                                            </div>
                                        </div> 
                                        <div class="side-widget-thumb">
                                            <h3 class="widget-title">
                                                Latest Blogs
                                            </h3>
                                            @foreach($posts as $post)
                                            <a href="blog-item.html">
                                                <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" class="thumbnail" alt="">
                                                <h5 class="title">
                                                    {{$post->title_en}}
                                                </h5>
                                                <span class="date">
                                                    {{$post->created_at}}
                                                </span>
                                            </a>
                                            @endforeach
                                        </div><!---End side-widget-thumb-->
                                        <div class="side-widget-thumb">
                                            <h3 class="widget-title">
                                               Related Posts
                                            </h3>
                                            @foreach($posts as $post)
                                            <a href="blog-item.html">
                                                <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" class="thumbnail" alt="">
                                                <h5 class="title">
                                                    {{$post->title_en}}
                                                </h5>
                                                <span class="date">
                                                    {{$post->created_at}}
                                                </span>
                                            </a>
                                            @endforeach
                                        </div><!---End side-widget-thumb-->
                                    </aside><!--End widget-wrap-->
                                </div><!--End Col-md-3-->
                            </div><!--End Row-->
                        </div><!--End container-->
                        
                    </div>
                </div><!--End Page Content-->
@endforeach
@endsection