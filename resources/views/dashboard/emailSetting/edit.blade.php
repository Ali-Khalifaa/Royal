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
                <a href="{{route('dashboard.emailSetting.index')}}">اعدادات البريل المرسل</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title">تعديل اعدادات البريل المرسل</h1>

    <div class="row">
        <div class="col-md-12">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> تعديل</span>
                    </div>
                    <div class="actions">

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"
                           data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form" style="height: auto;">
                    <form method="POST" action="{{route('dashboard.emailSetting.update',$emailSetting->id)}}"
                          role="form" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('put')}}

                        <div class="form-body">


                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">سعر الحجز للمصريين</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="title" name="price_egypt"
                                           value="{{$emailSetting->price_egypt}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">سعر الحجز لغير المصريين</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="title" name="price_non_egypt"
                                           value="{{$emailSetting->price_non_egypt}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">رقم تليفون التواصل</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" name="phone"
                                           value="{{$emailSetting->phone}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">البريد الالكترونى</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="title" name="email"
                                           value="{{$emailSetting->email}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">رقم فودافون كاش</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" name="vodafone_cash"
                                           value="{{$emailSetting->vodafone_cash}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">تاريخ حجز الترم الاول</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="title" name="registration_date"
                                           value="{{$emailSetting->registration_date}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">مصاريف الترم الاول ل mrd بالجنية</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="title" name="mrd_egypt"
                                           value="{{$emailSetting->mrd_egypt}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">مصاريف الترم الاول ل mrd بالدولار</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="title" name="mrd_dollar"
                                           value="{{$emailSetting->mrd_dollar}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">مصاريف الترم الاول ل morth بالجنية</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="title" name="morth_egypt"
                                           value="{{$emailSetting->morth_egypt}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">مصاريف الترم الاول ل morth بالدولار</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="title" name="morth_dollar"
                                           value="{{$emailSetting->morth_dollar}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-2 control-label" for="form_control_1">تاريخ حجز الترم الثانى</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="title" name="next_date"
                                           value="{{$emailSetting->next_date}}" required
                                           class="form-control col-md-6 col-xs-12">
                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <a href="{{route('dashboard.emailSetting.index')}}"
                                           class="btn default">الغاء</a>
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
