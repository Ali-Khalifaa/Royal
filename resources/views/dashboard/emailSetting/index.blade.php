@extends('layout.dashboard.app')

@section('content')


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>اعدادات البريل المرسل</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title">اعدادات البريل المرسل</h1>
{{--    <a href="{{route('dashboard.aboutsec.create')}}" class="btn green"> أضافة--}}
{{--        <i class="fa fa-plus"></i>--}}
{{--    </a>--}}
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>جدول عرض تفاصيل اعدادات البريل المرسل</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th> <i class="fa fa-cogs"></i></th>
                                <th><i class="fa fa-bookmark"></i> سعر الحجز للمصريين </th>
                                <th><i class="fa fa-bookmark"></i> سعر الحجز لغير المصريين </th>
                                <th><i class="fa fa-bookmark"></i> رقم تليفون التواصل </th>
                                <th><i class="fa fa-bookmark"></i> البريد الالكترونى </th>
                                <th><i class="fa fa-bookmark"></i> رقم فودافون كاش </th>
                                <th><i class="fa fa-bookmark"></i> تاريخ حجز الترم الاول </th>
                                <th><i class="fa fa-bookmark"></i> مصاريف الترم الاول ل mrd بالجنية </th>
                                <th><i class="fa fa-bookmark"></i> مصاريف الترم الاول ل mrd بالدولار </th>
                                <th><i class="fa fa-bookmark"></i> مصاريف الترم الاول ل morth بالجنية </th>
                                <th><i class="fa fa-bookmark"></i> مصاريف الترم الاول ل morth بالدولار </th>
                                <th><i class="fa fa-bookmark"></i> تاريخ حجز الترم الثانى </th>
                                <th><i class="fa fa-bookmark"></i> التحكم </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emailSittings as $index=>$setting)
                                <tr>
                                    <td scope="row">{{ $index + 1}}</td>

                                    <td>{{$setting->price_egypt }}</td>
                                    <td>{{$setting->price_non_egypt }}</td>
                                    <td>{{$setting->phone }}</td>
                                    <td>{{$setting->email }}</td>
                                    <td>{{$setting->vodafone_cash }}</td>
                                    <td>{{$setting->registration_date }}</td>
                                    <td>{{$setting->mrd_egypt }}</td>
                                    <td>{{$setting->mrd_dollar }}</td>
                                    <td>{{$setting->morth_egypt }}</td>
                                    <td>{{$setting->morth_dollar }}</td>
                                    <td>{{$setting->next_date }}</td>

                                    <td>
                                        <a href="{{route('dashboard.emailSetting.edit', $setting->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> تعديل </a>
{{--                                        <form method="POST" onclick="return confirm('Are you sure?')" action="{{route('dashboard.aboutsec.destroy', $setting->id)}}"  style="display:inline" >--}}
{{--                                            {{ csrf_field() }}--}}
{{--                                            {{ method_field('delete') }}--}}
{{--                                            <button name="_method" new="hidden" value="DELETE" class="btn btn-outline btn-circle dark btn-sm black">--}}
{{--                                                <span class="fa fa-trash-o"></span> حذف--}}
{{--                                            </button>--}}

{{--                                        </form>--}}
                                        {{-- <a href="javascript:;" class="btn btn-outline btn-circle dark btn-sm black">
                                          <i class="fa fa-trash-o"></i> Delete </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
