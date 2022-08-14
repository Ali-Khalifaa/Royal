@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> اعدادات السكشن الأول </span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> اعدادات السكشن الأول </h1>
    {{-- <a href="{{route('dashboard.aboutsectionone.create')}}" class="btn green"> أضافة
        <i class="fa fa-plus"></i>
    </a> --}}
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>جدول عرض تفاصيل السكشن الأول </div>
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
                                <th><i class="fa fa-bookmark"></i> العنوان الرئيسي الأول </th>
                                <th><i class="fa fa-file-text-o"></i> الوصف الأول </th>
                                <th><i class="fa fa-bookmark"></i> العنوان الفرعى الأول </th>
                                <th><i class="fa fa-bookmark"></i> العنوان الفرعى الثانى </th>
                                <th><i class="fa fa-bookmark"></i> العنوان الفرعى الثالث </th>
                                <th><i class="fa fa-bookmark"></i> العنوان الفرعى الرابع </th>
                                <th><i class="fa fa-bookmark"></i> العنوان الرئيسي الثانى </th>
                                <th><i class="fa fa-bookmark"></i> الوصف الثانى </th>
                                <th><i class="fa fa-file-image-o"></i> الصورة </th>

                                <th><i class="fa fa-bookmark"></i> التحكم </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aboutsectionones as $index=>$aboutsectionone)
                                <tr>
                                    <td scope="row">{{ $index + 1}}</td>
                                    <td>{{$aboutsectionone->name}}</td>
                                    
                                    <td>{!! $aboutsectionone->desc !!}</td>
                                    <td>{{$aboutsectionone->title_one}}</td>
                                    <td>{{$aboutsectionone->title_two}}</td>
                                    <td>{{$aboutsectionone->title_three}}</td>
                                    <td>{{$aboutsectionone->title_four}}</td>
                                    <td>{{$aboutsectionone->mission}}</td>
                                    
                                    <td>{!! $aboutsectionone->desc_mission !!}</td>

                                    <td>
                                        <img src="{{asset('uploads/about/one/'.$aboutsectionone->img)}}"  alt="Image" style="width:50px;height:50px;">
                                    </td>


                                    <td>
                                        <a href="{{route('dashboard.aboutsectionone.edit', $aboutsectionone->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> تعديل </a>
                                        {{-- <form method="POST" onclick="return confirm('Are you sure?')" action="{{route('dashboard.aboutsectionone.destroy', $aboutsectionone->id)}}"  style="display:inline" >
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button name="_method" new="hidden" value="DELETE" class="btn btn-outline btn-circle dark btn-sm black">
                                                <span class="fa fa-trash-o"></span> حذف
                                            </button>

                                        </form> --}}
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
