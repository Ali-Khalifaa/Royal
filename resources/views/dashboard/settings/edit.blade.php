@extends('layout.dashboard.app')

@section('content')


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{route('dashboard.setting.index')}}">الأعدادات</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title">تعديل اعدادات الصفحة الرئيسية</h1>

    <div class="row">
        <div class="col-md-12">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> اضافة</span>
                    </div>
                    <div class="actions">

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form" style="height: auto;">
                    <form action="{{route('dashboard.setting.update', $setting->id)}}" method="POST" >

                        {{ csrf_field() }}
                        {{ method_field('put')}}

                        <div class="form-body">
                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.العنوان</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="address" name="{{ $locale }}[address]" value="{{ $setting->translate($locale)->address }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach


                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">البريد الالكترونى</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" value="{{ $setting->email }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">رقم التليفون </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="phone" name="phone" value="{{ $setting->phone }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك الفيس بوك</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="facebook_link" name="facebook_link" value="{{ $setting->facebook_link }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1"> لينك تويتر</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="twitter_link" name="twitter_link" value="{{ $setting->twitter_link }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك لينكدان</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="linkedin_link" name="linkedin_link" value="{{ $setting->linkedin_link }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك يوتيوب</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="youtube_link" name="youtube_link" value="{{ $setting->youtube_link}}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">رقم الفاكس</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="fax" name="fax"  value="{{ $setting->fax}}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك الخريطة</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="map" name="map"  value="{{ $setting->map}}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            
                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. ساعات العمل الاولى</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="hourjopone" name="{{ $locale }}[hourjopone]" value="{{ $setting->translate($locale)->hourjopone }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. ساعات العمل الثانية</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="hourjoptwo" name="{{ $locale }}[hourjoptwo]" value="{{ $setting->translate($locale)->hourjoptwo }}"  class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. ساعات العمل الثالثة</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="hourjopthree" name="{{ $locale }}[hourjopthree]" value="{{ $setting->translate($locale)->hourjopthree }}"  class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <a href="{{route('dashboard.setting.index')}}" class="btn default">الغاء</a>
                                        <button class="btn blue" type="reset">اعادة</button>
                                        <button type="submit" class="btn btn-success">تعديل</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->

        </div>
    </div>
@endsection
