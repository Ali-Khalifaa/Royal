@extends('layout.frontend.main')
@section('content')


    <!--contact us section start -->
    <div class="contact_us_section med_toppadder100 med_bottompadder70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="choose_heading_wrapper med_bottompadder30">
                        <h1 class="med_bottompadder20">{{ __('messages.contact') }}</h1>
                        <img src="{{asset('frontend/assets/images/line.png')}}" alt="title" class="med_bottompadder20">
                    </div>

                    <form action="{{ route('contactComment') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('post')}}

                        <div class="cont_main_section">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="contect_form1 dc_cont_div">
                                        <input type="text" name="name" placeholder="{{ __('messages.name') }}" required
                                               class="require">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="contect_form1 dc_cont_div">
                                        <input type="text" name="email" placeholder="{{ __('messages.email') }}"
                                               required class="require" data-valid="email"
                                               data-error="Email should be valid.">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="contect_form1 dc_cont_div">
                                        <input type="text" name="phone" placeholder="{{ __('messages.phone') }}"
                                               required class="require">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="contect_form1 dc_cont_div">
                                        <input type="text" name="subject" placeholder="{{ __('messages.subject') }}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="contect_form4 dc_cont_div">
                                        <textarea rows="5" name="messege"
                                                  placeholder="{{ __('messages.EnterYourMessege') }}" required
                                                  class="require"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="response"></div>
                                    <div class="contact_btn_wrapper med_toppadder30">
                                        <button type="submit" class="submitForm">{{ __('messages.send') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!--contact us section end-->
    <!-- dc category section start-->
    <div class="category_wrapper">
        <div class="container">
            @foreach($settings as $index=>$setting)
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="cat_about cont_cat_abt">
                            <div class="icon_wrapper dc_icon_section">
                                <img src="{{asset('frontend/assets/images/icon_map.png')}}" alt="img"
                                     class="img-responsive">
                            </div>

                            <div class="cat_txt cont_cat_txt">
                                <h1>{{$setting->address}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="cat_about cont_cat_abt">
                            <div class="icon_wrapper dc_icon_section">
                                <img src="{{asset('frontend/assets/images/icon_call.png')}}" alt="img"
                                     class="img-responsive">
                            </div>

                            <div class="cat_txt cont_cat_txt">
                                <h1>{{$setting->phone}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="cat_about cont_cat_abt">
                            <div class="icon_wrapper dc_icon_section">
                                <img src="{{asset('frontend/assets/images/icon_envelope.png')}}" alt="img"
                                     class="img-responsive">
                            </div>

                            <div class="cat_txt cont_cat_txt cont_last_child">
                                <a href="#"><h1>{{$setting->email}}</h1></a>
                                {{-- <p>24 / 7online help support</p> --}}

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="map_main_wrapper cont_dc_map">

            <div style="width:100%; float:left; height:600px;">
                @foreach($settings as $index=>$setting)
                    <iframe src="{{ $setting->map }}" width="100%" height="600" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                @endforeach

            </div>
        </div>
    </div>
    <!-- dc category section end-->

@endsection
