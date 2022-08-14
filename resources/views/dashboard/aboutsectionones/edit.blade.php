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
                <a href="{{route('dashboard.aboutsectionone.index')}}">اعدادات سكشن عن الأكاديمية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title">تعديل اعدادات سكشن عن الأكاديمية</h1>

    <div class="row">
        <div class="col-md-12">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase">تعديل</span>
                    </div>
                    <div class="actions">

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form" style="height: auto;">
                    <form method="POST" action="{{route('dashboard.aboutsectionone.update',$aboutsectionone->id)}}"  role="form" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put')}}

                        <div class="form-body">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. العنوان </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" name="{{ $locale }}[name]" value="{{$aboutsectionone->translate($locale)->name}}" required class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. مقالة</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  name="{{ $locale }}[desc]" id="desc" value="{{$aboutsectionone->translate($locale)->desc}}" class="form-control col-md-7 col-xs-12" required>{{$aboutsectionone->translate($locale)->desc}}</textarea>
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.العنوان الفرعى الأول</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" name="{{ $locale }}[title_one]" value="{{$aboutsectionone->translate($locale)->title_one}}" required class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.العنوان الفرعى الثانى</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title_two" name="{{ $locale }}[title_two]" value="{{$aboutsectionone->translate($locale)->title_two}}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.العنوان الفرعى الثالث</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="title_three" name="{{ $locale }}[title_three]" value="{{$aboutsectionone->translate($locale)->title_three}}" required class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.العنوان الفرعى الرابع</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title_four" name="{{ $locale }}[title_four]" value="{{$aboutsectionone->translate($locale)->title_three}}" required class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.  العنوان الثانى </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="mission" name="{{ $locale }}[mission]" value="{{$aboutsectionone->translate($locale)->mission}}" required class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}. المقالةالثانية</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  name="{{ $locale }}[desc_mission]" id="desc_mission" value="{{$aboutsectionone->translate($locale)->desc_mission}}" class="form-control col-md-7 col-xs-12" required>{{$aboutsectionone->translate($locale)->desc_mission}}</textarea>
                                    </div>
                                </div>
                            @endforeach


                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">الصورة</label>
                                <div class="input-group" >
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="img" id="img" value="{{ $aboutsectionone->img }} required" class="form-control" >
                                    </div>
                                    <img class="image" src="{{asset('uploads/about/one/'.$aboutsectionone->img)}}"  alt="Image" style="width:100px;height:100px;margin-left:320px;">  
          
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <a href="{{route('dashboard.aboutsectionone.index')}}" class="btn default">الغاء</a>
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
