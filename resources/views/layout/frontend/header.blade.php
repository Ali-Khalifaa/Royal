    <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="{{asset('frontend/assets/images/preloader.gif')}}" id="preloader_image" alt="loader">
        </div>
    </div>
    <!--top header start-->
    <div class="top_header_wrapper d-none d-sn-none d-md-block d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="top_header_add">
                      
                            <ul>
                                @foreach($settings as $index=>$setting)
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ __('messages.address') }} :</span> {{$setting->address}}</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i><span>{{ __('messages.call_us') }} :</span> {{$setting->phone}}</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>{{ __('messages.email') }} :</span> {{$setting->email}}</a></li>
                                @endforeach
                            </ul>
                  
                    </div>
                    
                    <div class="top_login">
                        @if(Auth::check())
                            <ul>
                                <li>
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('messages.logout') }}</a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </li>

                            </ul>
                           
                            {{-- {{ Auth::user()->admissions->name}}  --}}
                            
                        @else

                            <ul>
                                <li>
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <a href="{{ route('login') }}">{{ __('messages.loginsiunup') }}	</a>
                                </li>
                            </ul>

                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!--header menu wrapper-->
    <div class="menu_wrapper header-area hidden-menu-bar stick">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow bounceInDown" data-wow-delay="0.6s">
                    <div class="header_logo">
                        <a href="{{route('index')}}" class="hidden-xs"><img src="{{asset('frontend/assets/images/LOGO_institute.png')}}" alt="logo" title="logo" class="img-responsive  d-none d-sm-none d-md-block d-lg-block"></a>
                    </div>
                </div>
                
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding: 0px;">

                    <div class="kv_navigation_wrapper">

                        <div class="mainmenu  d-xl-block d-lg-block d-md-block d-sm-none d-none" style="padding-bottom: 20px;">
                            <ul class="main_nav_ul direct_ul">

                                <li class="has-mega gc_main_navigation">
                                    <a href="{{route('index')}}" class="gc_main_navigation hover_color"> {{ __('messages.home') }}&nbsp; </a>
                                   
                                </li>

                                <li class="has-mega gc_main_navigation">
                                    @if(Auth::check())
                                        <a href="{{route('profile')}}" class="gc_main_navigation hover_color"> {{ __('messages.profile') }}&nbsp; </a>
                                    @else
                                        <a href="{{route('addmission')}}" class="gc_main_navigation hover_color"> {{ __('messages.addmission') }}&nbsp; </a>
                                    @endif
                                </li>

                                <li class="has-mega gc_main_navigation"><a href="{{route('services')}}" class="gc_main_navigation hover_color"> {{ __('messages.services') }}&nbsp; </a>
                                  
                                </li>

                                <li class="has-mega gc_main_navigation"><a href="{{route('about')}}" class="gc_main_navigation hover_color">{{ __('messages.about_Us') }}&nbsp; </a>
                                </li>

                                <li class="has-mega gc_main_navigation"><a href="{{route('our_doctors')}}" class="gc_main_navigation hover_color"> {{ __('messages.team_work') }}&nbsp;</a>
                                    <!-- <ul>
                                        <li class="parent"><a href="doctor.html">doctor single</a>
                                        </li>
                                        <li class="parent"><a href="our_doctors.html">our doctors</a>
                                        </li>

                                    </ul> -->
                                </li>

                                <li class="has-mega gc_main_navigation"><a href="{{route('gallery')}}" class="gc_main_navigation hover_color"> {{ __('messages.gallery') }}&nbsp;</a>
                                    
                                </li>

                                <li class="has-mega gc_main_navigation"><a href="{{route('contact')}}" class="gc_main_navigation hover_color"> {{ __('messages.contact') }}&nbsp; </a>
                                   
                                </li>

                                <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation hover_color"> {{ __('messages.language') }}&nbsp;</a>
                                    <ul>
                                        
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="parent">
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li> 

                            </ul>
                        </div>
                        <!-- mainmenu end -->
                    </div>

                </div>

                <div class="rp_mobail_menu_main_wrapper d-block d-sm-block d-md-none d-lg-none d-xl-none">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="gc_logo logo_hidn d-block d-sm-block d-md-none d-lg-none d-xl-none">
                                <a href="#"><img src="{{asset('frontend/assets/images/full_logo.png')}}" class="img-responsive" style="width: 210px;" alt="logo"></a>
                            </div>
                        </div>

                        <div class="col-xl-6  d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div id="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                    <g>
                                        <g>
                                            <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#28457d" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#28457d" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#28457d" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#28457d" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#28457d" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sidebar">
                    <h1>Royal Dentists Institute</h1>
                    <div id="toggle_close">&times;</div>
                    <div id='cssmenu' class="wd_single_index_menu">
                        <ul>

                            <li ><a href="{{route('index')}}">{{ __('messages.home') }}</a></li>

                            @if(Auth::check())
                                <li ><a href="{{route('profile')}}">{{ __('messages.profile') }}</a></li>
                            @else
                                <li ><a href="{{route('addmission')}}">{{ __('messages.addmission') }}</a></li>
                            @endif

                            <li><a href="{{route('services')}}">{{ __('messages.services') }}</a></li>

                            <li><a href="{{route('about')}}">{{ __('messages.about_Us') }}</a></li>

                            <li><a href="{{route('our_doctors')}}">{{ __('messages.team_work') }}</a> </li>

                            <li><a href="{{route('gallery')}}">{{ __('messages.gallery') }}</a></li>

                            <li><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>

                            <li class='has-sub'><a href="#"> {{ __('messages.language') }}&nbsp;</a>
                                <ul>
                                    
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </li> 

                            {{-- <li><a href="login_register.html">تسجيل الدخول / التسجيل</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header wrapper end-->