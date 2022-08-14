@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> رسائل الصفحة الرئيسية </span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> رسائل العملاء </h1>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>جدول عرض تفاصيل رسائل العملاء </div>
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
                                    <th><i class="fa fa-user"></i> الأسم </th>
                                    <th><i class="fa fa-bookmark"></i> الموضوع </th>
                                    <th><i class="fa fa-phone"></i> الهاتف </th>
                                    <th><i class="fa fa-at"></i> البريد الألكترونى </th>
                                    <th><i class="fa fa-file-text-o"></i> الرسالة </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($homeComments as $index=>$homeComment)
                                    <tr>
                                        <td scope="row">{{ $index + 1}}</td>
    
                                        <td>{{$homeComment->full_name }}</td>
                                        <td>{{$homeComment->subject }}</td>
                                        <td>{{$homeComment->phone }}</td>
                                        <td>{{$homeComment->email }}</td>
                                        <td>{{$homeComment->message }}</td>
                                        
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
