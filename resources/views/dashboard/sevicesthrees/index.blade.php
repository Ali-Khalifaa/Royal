@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> اعدادات السكشن الثالث </span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> اعدادات السكشن الثالث </h1>
    <a href="{{route('dashboard.sevicesthree.create')}}" class="btn green"> أضافة
        <i class="fa fa-plus"></i>
    </a>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>جدول عرض تفاصيل السكشن الثالث </div>
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
                                <th><i class="fa fa-bookmark"></i> الأسم </th>
                                <th><i class="fa fa-file-text-o"></i> الوصف </th>
                                <th><i class="fa fa-file-image-o"></i> الصورة </th>
                                <th><i class="fa fa-bookmark"></i> التحكم </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sevicesthrees as $index=>$sevicesthree)
                                <tr>
                                    <td scope="row">{{ $index + 1}}</td>
                                    <td>{{$sevicesthree->title}}</td>
                                    <td>{{$sevicesthree->desc}}</td>


                                    <td>
                                        <img src="{{asset('uploads/services/two/'.$sevicesthree->img)}}"  alt="Image" style="width:50px;height:50px;">
                                    </td>


                                    <td>

                                        <a href="{{asset('uploads/services/pdf/'.$sevicesthree->pdf)}}" target="_blank" class="btn btn-outline btn-circle btn-sm blue">
                                            ملف ال pdf </a>

                                        <a href="{{route('dashboard.sevicesthree.edit', $sevicesthree->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> تعديل </a>
                                        <form method="POST" onclick="return confirm('Are you sure?')" action="{{route('dashboard.sevicesthree.destroy', $sevicesthree->id)}}"  style="display:inline" >
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button name="_method" new="hidden" value="DELETE" class="btn btn-outline btn-circle dark btn-sm black">
                                                <span class="fa fa-trash-o"></span> حذف
                                            </button>

                                        </form>
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
