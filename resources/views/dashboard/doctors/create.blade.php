@extends('layout.dashboard.app')

@section('content')

    <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textArea',
            height: 160,
            toolbar: 'bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect | forecolor backcolor fontsizeselect | image media link table emoticons | bullist numlist | outdent indent blockquote | undo, redo removeformat | subscript superscript | restoredraft code',
            plugins: 'code textcolor colorpicker image emoticons link autolink autosave hr media table wordcount lists',
            menubar: "file edit insert format table"
        });
    </script>


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{route('dashboard.doctor.index')}}">اعدادات صفحة الدكاترة</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>اضافة</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> أضافة متخصص من فريق العمل</h1>

    <div class="row">
        <div class="col-md-12">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase">اضافة</span>
                    </div>
                    <div class="actions">

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form" style="height: auto;">
                    <form method="POST" action="{{route('dashboard.doctor.store')}}"  role="form" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post')}}

                        <div class="form-body">

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. الأسم</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="{{ $locale }}[name]" value="{{ old($locale . '.name') }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.التخصص</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="specialist" name="{{ $locale }}[specialist]" value="{{ old($locale . '.specialist') }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك الفيس بوك</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1"> لينك تويتر</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="twitter_link" name="twitter_link" value="{{ old('twitter_link') }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك لينكدان</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link') }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">لينك يوتيوب</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="youtube_link" name="youtube_link" value="{{ old('youtube_link') }}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">الصورة</label>
                                <div class="input-group" >
                                    <div class="col-md-6 col-sm-6 col-xs-12" >
                                        <input type="file" name="img" id="img" required class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <a href="{{route('dashboard.doctor.index')}}" class="btn default">الغاء</a>
                                        <button class="btn blue" type="reset">اعادة</button>
                                        <button type="submit" class="btn btn-success">اضافة</button>
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
