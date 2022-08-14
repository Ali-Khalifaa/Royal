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
                <a href="{{route('dashboard.slider.index')}}">صفحة تفاصيل السلايدر</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>اضافة</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title">أضافة سكشن السلايدر</h1>

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

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"
                           data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form" style="height: auto;">
                    <form method="POST" action="{{route('dashboard.slider.store')}}" role="form"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('post')}}

                        <div class="form-body">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.
                                        العنوان </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea required name="{{ $locale }}[title]" id="title"
                                                  value="{{ old($locale . '.title') }}"
                                                  class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group form-md-line-input has-success">
                                    <label class="col-md-2 control-label" for="form_control_1">{{ $locale }}.
                                        الوصف </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea required name="{{ $locale }}[desc]" id="desc"
                                                  value="{{ old($locale . '.desc') }}"
                                                  class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">الصورة</label>
                                <div class="input-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="img" id="img" required class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <a href="{{route('dashboard.slider.index')}}" class="btn default">الغاء</a>
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
