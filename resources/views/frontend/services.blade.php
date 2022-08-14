@extends('layout.frontend.main')
@section('content')

    <!--med_tittle_section-->
    <div class="med_tittle_section">
        <div class="med_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="med_tittle_cont_wrapper">
                        <div class="med_tittle_cont">
                            <h1>{{ __('messages.services') }}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('index')}}">{{ __('messages.home') }}</a>
                                <li>{{ __('messages.services') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- med_tittle_section End -->
    <!--service section start-->
{{--    <div class="team_wrapper med_toppadder100">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">--}}
{{--                    <div class="team_heading_wrapper med_bottompadder40">--}}
{{--                        <h1 class="med_bottompadder20">{{ __('messages.MOSTPOPULARSERVICES') }}</h1>--}}
{{--                        <img src="{{asset('frontend/assets/images/Icon_team.png')}}" alt="line"--}}
{{--                             class="med_bottompadder20">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="ser_slider_wrapper">--}}
{{--                        <div class="owl-carousel owl-theme">--}}
{{--                            <div class="item">--}}
{{--                                <div class="row">--}}
{{--                                    @foreach($servicesones as $index=>$servicesone)--}}
{{--                                        @if ($index <= 2)--}}
{{--                                            <div--}}
{{--                                                class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block">--}}
{{--                                                <div class="cat_about ser_section">--}}
{{--                                                    <div class="icon_wrapper">--}}
{{--                                                        <img src="{{asset('frontend/assets/images/icon3.png')}}"--}}
{{--                                                             alt="img" class="img-responsive">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cat_img cat_img_3">--}}
{{--                                                        <img src="{{asset('frontend/assets/images/icon3.png')}}"--}}
{{--                                                             alt="img" class="img-responsive">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cat_txt">--}}
{{--                                                        <h1>{{$servicesone->title}}</h1>--}}
{{--                                                        <p>{{$servicesone->desc}}</p>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                    @endforeach--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="row">--}}
{{--                                    @foreach($servicesones as $index=>$servicesone)--}}
{{--                                        @if ($index >= 3)--}}
{{--                                            <div--}}
{{--                                                class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block">--}}
{{--                                                <div class="cat_about ser_section">--}}
{{--                                                    <div class="icon_wrapper">--}}
{{--                                                        <img src="{{asset('frontend/assets/images/icon3.png')}}"--}}
{{--                                                             alt="img" class="img-responsive">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cat_img cat_img_3">--}}
{{--                                                        <img src="{{asset('frontend/assets/images/icon3.png')}}"--}}
{{--                                                             alt="img" class="img-responsive">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cat_txt">--}}
{{--                                                        <h1>{{$servicesone->title}}</h1>--}}
{{--                                                        <p>{{$servicesone->desc}}</p>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--service section end-->
    <!--ser_abt section start-->
    <div class="ser_abt">
        <div class="container">
            @foreach($sevicestwos as $index=>$sevicestwo)
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="ser_abt_img_resp">
                            <img src="{{asset('uploads/services/one/'.$sevicestwo->img)}}" alt="img"
                                 class="img-responsive">
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 abt_section">
                        <div class="abt_txt abt_txt_resp">
                            <h3>{{$sevicestwo->name}}</h3>
                            <p class="med_toppadder20">{{$sevicestwo->desc}}</p>
                        </div>
                        <div class="abt_chk med_toppadder30">
                            <div class="content">
                                <ul>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$sevicestwo->title_one}}</span></li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$sevicestwo->title_two}}</span></li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$sevicestwo->title_three}}</span></li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$sevicestwo->title_four}}</span></li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$sevicestwo->title_fiv}}</span></li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$sevicestwo->title_six}}</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <!--ser_abt section end-->
    <!--ser_blog section start-->
    <div class="blog_wrapper med_toppadder100 med_bottompadder90">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                    <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                        <h1 class="med_bottompadder20">{{ __('messages.TOPSERVICES') }}</h1>
                        <img src="{{asset('frontend/assets/images/Icon_team.png')}}" alt="line"
                             class="med_bottompadder20">

                    </div>
                </div>
                @foreach($sevicesthrees as $index=>$sevicesthree)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="blog_about blog_resp wow SlideInLeft" data-wow-delay="0.4s">
                            <div class="blog_img blog_img_resp">
                                <figure>
                                    <img src="{{asset('uploads/services/two/'.$sevicesthree->img)}}" alt="img"
                                         class="img-responsive">
                                </figure>
                            </div>
                            <div class="blog_txt">
                                <h1><a href="{{$sevicesthree->pdf?asset('uploads/services/pdf/'.$sevicesthree->pdf):"#"}}" target="_blank">{{$sevicesthree->title}}</a></h1>
                                <p>{{$sevicesthree->desc}}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ser_blog section end-->

@endsection
