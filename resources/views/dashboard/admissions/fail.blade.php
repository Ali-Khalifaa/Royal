@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>الطلاب المرفوضون </span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> الطلاب المرفوضون </h1>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">جدول عرض تفاصيل الطلاب المرفوضون  </span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th> <i class="fa fa-cogs"></i></th>
                                <th><i class="fa fa-user"></i> الأسم </th>
                                <th><i class="fa fa-bookmark"></i> الجنس </th>
                                <th><i class="fa fa-phone"></i> الهاتف </th>
                                <th><i class="fa fa-at"></i> البريد الألكترونى </th>
                                <th><i class="fa fa-file-text-o"></i> تاريخ الميلاد </th>
                                <th><i class="fa fa-file-text-o"></i> تاريخ التخرج </th>
                                <th><i class="fa fa-file-text-o"></i>  حالة العمل </th>
                                <th><i class="fa fa-file-text-o"></i> الجنسية </th>
                                <th><i class="fa fa-bookmark"></i> عرض </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($admissions as $index=>$admission)
                               
                                <tr>
                                    <td scope="row">{{ $index + 1}}</td>

                                    <td>{{$admission->name }}</td>
                                    <td>{{$admission->gender }}</td>
                                    <td>{{$admission->phone }}</td>
                                    <td>{{$admission->email }}</td>
                                    <td>{{$admission->birth_date }}</td>
                                    <td>{{$admission->graduation }}</td>
                                    @if($admission->work==1)
                                        <td>
                                            <span class="label label-sm label-success"> يعمل </span>
                                        </td>
                                    @else
                                        <td >
                                            <span class="label label-sm label-warning"> لا يعمل </span>
                                        </td>
                                    @endif
                                    
                                    <td>{{$admission->nationalities->country_arNationality }}</td>
                                    
                                    <td>
                                        <a href="{{route('dashboard.addmission.show', $admission->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> عرض </a>
                                    
                                    </td>

                                
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
          
        </div>
    </div>

@endsection