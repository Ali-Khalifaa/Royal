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
                        <h1> {{ __('messages.gallery') }}</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}">{{ __('messages.home') }}</a>
                            </li>
                            <li>{{ __('messages.gallery') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- med_tittle_section End -->
<!-- portfolio-section start -->
<section class="portfolio-area med_toppadder100">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <ul class="protfoli_filter gallerY_wrapper">
                    <li class="active" data-filter=".all"><a href="#"> الكل</a></li>

                    <li data-filter=".business"><a href="#">الطلاب</a></li>
                    <li data-filter=".website"><a href="#">الخريجين</a></li>
                    <li data-filter=".photoshop"><a href="#">المحاضرين</a></li>
                </ul>
            </div> --}}

            <div class="col-lg-12">
                <div class="row portfoli_inner">
                    @foreach($galleries as $index=>$gallery)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 portfolio-wrapper all photoshop">
                            <div class="portfolio-thumb">
                                <div class="port_img_wrapper">
                                    <img src="{{asset('uploads/galleries/'.$gallery->img)}}" alt="filter_img">
                                </div>
                                <div class="portfolio_icon_wrapper_3 zoom_popup">
                                    <a class="img-link" href="{{asset('uploads/galleries/'.$gallery->img)}}"> <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>

                                <div class="portfolio-content">
                                    <div class="portfolio-info_3">
                                        <h3>{{$gallery->title}}</h3>
                                        <p class="d-none d-sm-none d-md-none d-lg-block">{{$gallery->desc}}</p>
                                    </div>
                                    <!-- portfolio-info -->

                                </div>
                                <!-- portfolio-content -->

                            </div>
                            <!-- /.portfolio-thumb -->
                        </div>
                    @endforeach
                </div>
            </div>
            <!--/#gridWrapper-->

            <!-- <div class="text-center portfolio-btn gallerY_btn med_bottompadder100 ">
                <a href="#" class="btn">Load More</a>
            </div> -->
        </div>
    </div>
    <!-- /.container -->
</section>

@endsection