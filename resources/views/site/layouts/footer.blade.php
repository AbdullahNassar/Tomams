                <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        <h3 class="title">عن الموقع</h3>
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <p>
                                            {{$data->get('about_ar')}}
                                        </p>
                                    </div><!-- End Footer-Widget-Conten -->
                                
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        <h3 class="title">تسوق الان</h3>
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <ul class="important-links second-list">
                                            @foreach($categories as $cat)
                                            <li><a href="{{ route('site.category' , ['id' => $cat->cat_id]) }}">{{$cat->cat_name_ar}}</a></li>
                                            @endforeach
                                        </ul><!-- End Importany-Links -->
                                    </div><!-- End Footer-Widget-Conten -->
                                
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                            <div class="col-md-2 col-sm-6">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        <h3 class="title">روابط اخرى</h3>
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <ul class="important-links">
                                            <li>
                                                <a href="#">اقسام الموقع</a>
                                            </li>
                                            <li>
                                                <a href="#">سياسة الاسترجاع</a>
                                            </li>
                                            <li>
                                                <a href="#">طرق الدفع</a>
                                            </li>
                                            <li>
                                                <a href="#">سياسة الخصوصية</a>
                                            </li>
                                        </ul><!-- End Importany-Links -->
                                    </div><!-- End Footer-Widget-Conten -->
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        <h3 class="title">تواصل معنا</h3>
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <ul class="contact-list">
                                            <li>
                                                <span>الهاتف : </span>
                                                <span>{{$contact->get('phone')}}</span>
                                            </li>
                                            <li>
                                                <span>البريد الالكتروني : </span>
                                                <span>{{$contact->get('email')}}</span>
                                            </li>
                                            <li>
                                                <span>المكان : </span>
                                                <span>{{$contact->get('address_ar')}}</span>
                                            </li>
                                        </ul><!-- End Contact-List -->
                                        <ul class="social-list">
                                            <li>
                                                <a href="{{$contact->get('facebook')}}">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('twitter')}}">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('linkedin')}}">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul><!-- End Social-List -->
                                    </div><!-- End Footer-Widget-Conten -->
                                
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                        </div><!-- End row -->
                    </div><!-- End container -->
                </footer><!-- End Footer -->
                
                <div class="copy-right text-center">
                    <div class="container">
                        © جميع الحقوق محفوظة ل <a href="#">To mamas</a>
                    </div><!-- End container -->
                </div><!--End Copy-Right -->