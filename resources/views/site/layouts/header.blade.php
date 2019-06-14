            <div class="header">
                <div class="container">
                    <a href="{{route('site.home')}}" class="logo">
                        <img src="{{asset('assets/site/images/Logo.png')}}" alt="logo-img">
                    </a>
                    <div class="header-search">
                        <form class="header-search-form" method="GET" action="{{route('product.search')}}">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="search" placeholder="اكتب ما تبحث عنه">
                            <button class="search-btn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form><!--End Header-Search-form -->
                    </div><!--End Header-Search -->
                    <div class="header-control">
                        <div class="icon side-user">
                            @if (Auth::guard('members')->check())
                            <a href="#" class="overlay-drop">
                                <i class="fa fa-user"></i>
                            </a>
                            @else
                            <a href="{{route('site.login')}}">
                                <i class="fa fa-user"></i>
                            </a>
                            @endif
                            <div class="side-menu user-profile">
                                <div class="side-menu-head">
                                    <h3 class="title title-lg">
                                        حقيبة التسوق
                                    </h3>
                                    <a href="#" id="menu-btn">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div><!-- End Side-Menu-Head -->
                                @if (Auth::guard('members')->check())
                                <div class="side-menu-content">
                                    <div class="user-detail">
                                        @if(Auth::guard('members')->user()->avatar == null)
                                            <img class="btn-product-image" src="{{asset('assets/site/images/user-icon.png')}}">
                                        @else
                                            <img class="btn-product-image" src="{{asset('storage/uploads/members').'/'.Auth::guard('members')->user()->avatar}}">
                                        @endif
                                        <div class="user-info">
                                            <h3 class="title">{{Auth::guard('members')->user()->name}}</h3>
                                            <span class="email">{{Auth::guard('members')->user()->email}}</span>
                                            <a href="{{route('site.profile')}}" class="custom-btn">الملف الشخصى</a>
                                        </div><!-- End User-Info -->
                                    </div><!-- End User-Detail -->
                                    <ul class="profile-links">
                                        <li>
                                            <a href="{{ route('site.wishlist' , ['id' => Auth::guard('members')->user()->id]) }}">
                                                <i class="fa fa-heart"></i>
                                                <span>قائمة المفضلة</span>
                                                <span class="number">@if (Auth::guard('members')->check()) {{$count}} @else 0 @endif</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('site.profile.edit')}}">
                                                <i class="fa fa-gear"></i>
                                                <span>الاعدادات</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('site.logout')}}">
                                                <i class="fa fa-power-off"></i>
                                                <span>تسجيل الخروج</span>
                                            </a>
                                        </li>
                                    </ul><!--End Profile-links-->
                                </div><!--End side-menu-content-->
                                @endif
                            </div><!-- End Side-Menu -->
                        </div>
                        <div class="icon">
                            @if (Auth::guard('members')->check())
                            <a href="{{ route('site.cart' , ['id' => Auth::guard('members')->user()->id]) }}">
                                <div class="cart-icon">
                                    <i class="fa fa-shopping-basket"></i>
                                </div><!-- End Cart-Icon -->
                                <div class="cart-body">
                                    <span class="badge" style="margin-bottom: 15px;">سلة التسوق ({{$cart}})</span>
                                </div><!-- End Cart-Body -->
                            </a>
                            @else
                            <a href="{{ route('site.login') }}">
                                <div class="cart-icon">
                                    <i class="fa fa-shopping-basket"></i>
                                </div><!-- End Cart-Icon -->
                                <div class="cart-body">
                                    <span class="badge" style="margin-bottom: 15px;">سلة التسوق (0)</span>
                                </div><!-- End Cart-Body -->
                            </a>
                            @endif
                            @if (Auth::guard('members')->check())
                            <div class="side-menu">
                                <div class="side-menu-head">
                                    <h3 class="title title-lg">
                                        حقيبة التسوق
                                        <span>(@if (Auth::guard('members')->check()) {{$cart}} @else 0 @endif) عنصر</span>
                                    </h3>
                                    <a href="#" class="overlay-drop">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div><!-- End Side-Menu-Head -->
                                <div class="side-menu-content">
                                    @foreach($products as $p)
                                    <div class="cart-item-widget">
                                        <div class="cart-item-img">
                                            <img src="{{asset('storage/uploads/products').'/'.$p->image}}" alt="cart item">
                                        </div><!--End cart-item-img-->
                                        <div class="cart-item-content">
                                            <a href="{{ route('site.product' , ['id' => $p->p_id]) }}" class="title">
                                                {{$p->name_ar}}
                                            </a>
                                            <div class="product-counter">
                                                <a href="#" class="number-up">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <input value="1" class="form-control" type="text" name="quantity">
                                                <a href="#" class="number-down">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div><!--End cat-number-->
                                            <p class="price">
                                                السعر:
                                                <span> {{$p->sale_price}} ر.س</span>
                                            </p>
                                            <a class="btn-remove" href="{{ route('cart.delete' , ['id' => $p->c_id]) }}">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div><!--End Cart-item-content-->
                                    </div><!--End Cart-item-widget-->
                                    @endforeach
                                </div><!-- End Side-Menu-Content -->
                                <div class="side-menu-footer">
                                    <div class="cart-total">
                                        <span>
                                            الاجمالي: 
                                        </span>
                                        <span>
                                             {{$total}} ر.س
                                        </span>
                                    </div><!--End Cart-total-->
                                    <a href="{{ route('site.cart' , ['id' => Auth::guard('members')->user()->id]) }}" class="custom-btn">
                                        متابعة للدفع
                                    </a>
                                </div><!-- End Side-Menu-Footer -->
                            </div><!-- End Side-Menu -->
                            @endif
                        </div>
                        
                    </div><!--End header-control-->
                    
                    <button class="btn btn-responsive-nav" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div><!-- End container -->
                <div class="navbar-collapse collapse">
                    <div class="container">
                        <nav class="nav-main">
                            <ul class="nav navbar-nav">
                                @foreach($categories as $cat)
                                <li><a href="{{ route('site.category' , ['id' => $cat->cat_id]) }}">{{$cat->cat_name_ar}}</a></li>
                                @endforeach
                            </ul>
                        </nav><!-- End nav-main -->
                    </div><!-- End container -->
                </div><!-- End navbar-collapse -->
            </div><!-- End Header -->
