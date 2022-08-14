 <!-- footer wrapper start-->
 <div class="footer_wrapper">
    <div class="container">
        <div class="box_1_wrapper">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="address_main">
                        <div class="footer_widget_add">
                            <a href="#"><img src="{{asset('frontend/assets/images/full_logo_white.png')}}" style="width: 260px;" class="img-responsive" alt="footer_logo" /></a>
                            <p>{{ __('messages.title') }}</p>
                            <a href="{{route('about')}}">{{ __('messages.ReadMore') }}</a>
                        </div>
                        <div class="footer_box_add">
                            @foreach($settings as $index=>$setting)
                                <ul>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ __('messages.address') }} : </span>{{$setting->address}}</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><span>{{ __('messages.call_us') }} :</span> {{$setting->phone}}</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>{{ __('messages.email') }} :</span> {{$setting->email}}</a></li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer_1-->
        <div class="booking_box_div">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="footer_main_wrapper">
                        <div class="row revers">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 gallary_response  d-md-none d-lg-block">
                                <div class="footer_heading">

                                    <h1 class="med_bottompadder10"> {{ __('messages.Instagram') }} </h1>

                                    <img src="{{asset('frontend/assets/images/line.png')}}" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_gallary">
                                    <div class="row">
                                        <ul>
                                            @foreach($footers as $footer)
                                            <li>
                                                <a href="{{$footer->link}}" target="_blank">
                                                <img src="{{asset('uploads/footer/'.$footer->img)}}" alt="img" class="img-responsive">
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--footer_2-->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 respons_footer_nav d-none d-sm-none d-md-block">
                                <div class="footer_heading footer_menu">
                                    <h1 class="med_bottompadder10">{{ __('messages.USERFUL') }}</h1>
                                    <img src="{{asset('frontend/assets/images/line.png')}}" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_ul_wrapper">
                                    <ul>
                                        <li><i class="fa fa-caret-left" aria-hidden="true"></i> <a href="{{route('index')}}">{{ __('messages.home') }}</a></li>
                                        <li><i class="fa fa-caret-left" aria-hidden="true"></i><a href="{{route('about')}}">{{ __('messages.about_Us') }}</a></li>
                                        <li><i class="fa fa-caret-left" aria-hidden="true"></i><a href="{{route('services')}}">{{ __('messages.services') }}</a></li>
                                        <li><i class="fa fa-caret-left" aria-hidden="true"></i><a href="{{route('our_doctors')}}">{{ __('messages.team_work') }}</a></li>
                                        <li><i class="fa fa-caret-left" aria-hidden="true"></i><a href="{{route('gallery')}}">{{ __('messages.gallery') }}</a></li>
                                        <li><i class="fa fa-caret-left" aria-hidden="true"></i><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--footer_3-->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 contact_last_div">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10">{{ __('messages.contact_us') }}</h1>
                                    <img src="{{asset('frontend/assets/images/line.png')}}" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_cnct">
                                    @foreach($settings as $index=>$setting)
                                    <p>{{$setting->hourjopone}}</p>
                                    <p>{{$setting->hourjoptwo}}</p>
                                    <p>{{$setting->hourjopthree}}</p>
                                    @endforeach
                                </div>
                            </div>
                            <!--footer_4-->
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="footer_botm_wrapper">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="bottom_footer_copy_wrapper">
                                    <span>Copyright © 2021- <a href="http://innovations-eg.com/">innovations</a></span>
                                </div>
                                <div class="footer_btm_icon">
                                    @foreach($settings as $index=>$setting)
                                    <ul>
                                        <li><a href="{{$setting->youtube_link}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <li><a href="{{$setting->linkedin_link}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="{{$setting->twitter_link}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="{{$setting->facebook_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer_5-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="up_wrapper">
                <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<!--footer wrapper end-->
