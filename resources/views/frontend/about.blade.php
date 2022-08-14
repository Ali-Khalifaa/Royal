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
                            <h1>{{ __('messages.about_Us') }} </h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('index')}}">{{ __('messages.home') }}</a>
                                </li>
                                <li>{{ __('messages.about_Us') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- med_tittle_section End -->
    <!--about us section start-->
    <div class="about_us_wrapper">
        <div class="container">
            @foreach($aboutsectionones as $index=>$aboutsectionone)
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="about_img">
                            <img src="{{asset('uploads/about/one/'.$aboutsectionone->img)}}" alt="img"
                                 class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 med_toppadder70">
                        <div class="abt_heading_wrapper abt_2_heading">
                            <h1 class="med_bottompadder20">{{ __('messages.aboutacademy') }}</h1>
                            <img src="{{asset('frontend/assets/images/line.png')}}" alt="title"
                                 class="med_bottompadder20">
                        </div>
                        <div class="abt_txt">
                            <h3>{{$aboutsectionone->name}}</h3>
                            <p class="med_toppadder20">
                                {{$aboutsectionone->desc}}
                            </p>
                        </div>
                        <div class="abt_chk med_toppadder30">
                            <div class="content">
                                <ul>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$aboutsectionone->title_one}}</span>
                                    </li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$aboutsectionone->title_two}}</span>
                                    </li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$aboutsectionone->title_three}}</span>
                                    </li>
                                    <li><i class="fa fa-check-square-o"
                                           aria-hidden="true"></i><span>{{$aboutsectionone->title_four}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="abt_heading_wrapper abt_2_heading_mn">
                            <h1 class="med_bottompadder20">{{$aboutsectionone->mission}}</h1>
                            <img src="{{asset('frontend/assets/images/line.png')}}" alt="title"
                                 class="med_bottompadder20">
                        </div>
                        <div class="abt_txt">
                            <p class="med_toppadder20">{{$aboutsectionone->desc_mission}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--about us section end-->
    <!-- counter wrapper start-->
    <div class="counter_section">
        <div class="counter_overlay">
            <section class="counter-section section-padding" data-stellar-background-ratio="0.5">
                <div class="container text-center">
                    <div class="row">
                        @foreach($counters as $index=>$counter)
                            @if($index == 0)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="icon">
                                        <a href="#"><img src="{{asset('frontend/assets/images/png/patient.png')}}"
                                                         alt="img" class="img-responsive"></a>
                                    </div>
                                    <div class="count-description">
                                        <span class="timer">{{$counter->numper}}</span>
                                        <h5 class="con1">{{$counter->title}}</h5>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        @foreach($counters as $index=>$counter)
                            @if($index == 1)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="icon">
                                        <a href="#"><img src="{{asset('frontend/assets/images/png/doctor.png')}}"
                                                         alt="img" class="img-responsive"></a>
                                    </div>
                                    <div class="count-description">
                                        <span class="timer">{{$counter->numper}}</span>
                                        <h5 class="con1">{{$counter->title}}</h5>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        @foreach($counters as $index=>$counter)
                            @if($index == 2)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="icon">
                                        <a href="#"><img src="{{asset('frontend/assets/images/png/success.png')}}"
                                                         alt="img" class="img-responsive"></a>
                                    </div>
                                    <div class="count-description">
                                        <span class="timer">{{$counter->numper}}</span>
                                        <h5 class="con1">{{$counter->title}}</h5>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        @foreach($counters as $index=>$counter)
                            @if($index == 3)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="icon">
                                        <a href="#"><img src="{{asset('frontend/assets/images/png/heart.png')}}"
                                                         alt="img" class="img-responsive"></a>
                                    </div>
                                    <div class="count-description">
                                        <span class="timer">{{$counter->numper}}</span>
                                        <h5 class="con1">{{$counter->title}}</h5>
                                    </div>
                                </div>
                            @endif

                        @endforeach

                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- counter wrapper end-->
    <!-- abt service wrapper start-->
    <div class="abt_service_section med_toppadder100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                    <div class="team_heading_wrapper med_bottompadder50">
                        <h1 class="med_bottompadder20">{{ __('messages.WEGIVEYOUTHEBEST') }}</h1>
                        <img src="{{asset('frontend/assets/images/Icon_team.png')}}" alt="line"
                             class="med_bottompadder20">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="abt_left_section med_bottompadder20">
                        <img src="{{asset('frontend/assets/images/abt_img_bg.jpg')}}" alt="img" class="img-responsive">
                    </div>
                    {{-- <div class="abt_txt">
                        <p>المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى</p>
                        <p class="med_toppadder10">المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى المقالة الأولى.</p>
                    </div> --}}
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="sidebar_wrapper sidebar_right_abt">
                        <div class="accordionFifteen">
                            <div class="panel-group" id="accordionFifteenLeft" role="tablist">
                                @foreach($aboutsectionthrees as $index=>$aboutsectionthree)
                                    @if($index == 0)
                                        <div class="panel panel-default sidebar_pannel">
                                            <div class="panel-heading desktop">
                                                <h4 class="panel-title">
                                                    s <a class="collapsed active" data-toggle="collapse"
                                                         href="#coll{{$aboutsectionthree->id}}"
                                                         aria-expanded="false">{{$aboutsectionthree->title}}</a>
                                                </h4>
                                            </div>
                                            <div id="coll{{$aboutsectionthree->id}}"
                                                 class="panel-collapse collapse show"
                                                 data-parent="#accordionFifteenLeft" aria-expanded="true"
                                                 role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="panel_cont">
                                                        <p>{{$aboutsectionthree->desc}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <!-- /.panel-default -->
                                        <div class="panel panel-default sidebar_pannel">
                                            <div class="panel-heading horn">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse"
                                                       href="#collapseEightLefttwo{{$aboutsectionthree->id}}"
                                                       aria-expanded="false">{{$aboutsectionthree->title}}</a>
                                                </h4>
                                            </div>
                                            <div id="collapseEightLefttwo{{$aboutsectionthree->id}}"
                                                 class="panel-collapse collapse" data-parent="#accordionFifteenLeft"
                                                 aria-expanded="false" style="height: 0px;" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="panel_cont">
                                                        <p>{{$aboutsectionthree->desc}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach


                            </div>
                            <!--end of /.panel-group-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- abt service wrapper end-->
    <!--top service wrapper start-->
    <!-- counter wrapper start-->
{{--    <div class="top_service_wrapper">--}}
{{--        <div class="top_serv_overlay">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">--}}
{{--                        <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">--}}
{{--                            <h1 class="med_bottompadder20">{{ __('messages.WEPROVIDETOPSERVICES') }}</h1>--}}
{{--                            <img src="{{asset('frontend/assets/images/Icon_team.png')}}" alt="line"--}}
{{--                                 class="med_bottompadder20">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @foreach ($services as $service)--}}
{{--                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">--}}
{{--                            <div class="cat_about top_serv_txt">--}}
{{--                                <div class="icon_wrapper">--}}
{{--                                    <img src="{{asset('frontend/assets/images/icon3.png')}}" alt="img"--}}
{{--                                         class="img-responsive">--}}
{{--                                </div>--}}
{{--                                <div class="cat_img cat_img_3">--}}
{{--                                    <img src="{{asset('frontend/assets/images/icon3.png')}}" alt="img"--}}
{{--                                         class="img-responsive">--}}
{{--                                </div>--}}
{{--                                <div class="cat_txt">--}}
{{--                                    <h1>{{ $service->title }}</h1>--}}
{{--                                    <p>{{ $service->desc }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- top service wrapper end-->

    <!-- event wrapper end-->
    <!--testimonial wrapper start-->
    @if(count($clientsays) > 0)
    <div class="testimonial_wrapper med_toppadder100">
        <div class="test_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="test_heading_wrapper">
                        <h1 class="med_bottompadder20">{{ __('messages.WHATSTUDENTSARESAYING') }}</h1>
                        <img src="{{asset('frontend/assets/images/line.png')}}" alt="title" class="med_bottompadder60">
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="test_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            @foreach($clientsays as $index=>$clientsay)
                                <div class="item">
                                    <div class="t_icon_wrapper">
                                        <div class="t_client_cont_wrapper2">
                                            <p>{{$clientsay->desc}}</p>
                                            <div class="client_img_abt">
                                                <img class="img-circle"
                                                     src="{{asset('uploads/home/clientsay/'.$clientsay->img)}}"
                                                     alt="img" style="width:90px;height:90px;">
                                                <h5>{{$clientsay->name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- testimonial wrapper end-->
    @if(count($partenars) > 0)
    <!--partner wrapper start-->
    <div class="partner_wrapper med_bottompadder80 med_toppadder80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="partner_slider_img">
                        <div class="owl-carousel owl-theme">
                            @foreach($partenars as $index=>$partenar)
                                <div class="item">
                                    <img src="{{asset('uploads/event/'.$partenar->img)}}" class="img-responsive"
                                         alt="story_img"/>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--partner wrapper end-->

@endsection
