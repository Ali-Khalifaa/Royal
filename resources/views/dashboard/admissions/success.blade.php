@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> الطلاب الناجحون </span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> الطلاب الناجحون </h1>
    
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">جدول عرض تفاصيل الطلاب الناجحون فى الأمتحان</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th> <i class="fa fa-cogs"></i></th>
                                <th><i class="fa fa-user"></i> الأسم </th>
                                <th><i class="fa fa-bookmark"></i> حالة الأمتحان </th>
                                <th><i class="fa fa-bookmark"></i> الجنس </th>
                                <th><i class="fa fa-phone"></i> الهاتف </th>
                                <th><i class="fa fa-at"></i> البريد الألكترونى </th>
                                <th><i class="fa fa-file-text-o"></i> الدرجه </th>
                                <th><i class="fa fa-file-text-o"></i> النسبة المؤية </th>
                                <th><i class="fa fa-file-text-o"></i>  حالة العمل </th>
                                <th><i class="fa fa-file-text-o"></i> الجنسية </th>
                              
                                <th><i class="fa fa-bookmark"></i> عرض </th>
                                <th><i class="fa fa-bookmark"></i> الموافقة وارسال التأكيد </th>
                                <th><i class="fa fa-bookmark"></i> الرفض </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($admissions as $index=>$admission)

                            @if($admission->user->accepted == 0)
                            <tr>
                                <td scope="row">{{ $index + 1}}</td>

                                <td>{{$admission->user->admissions->name }}</td>
                                <td>
                                    <span class="label label-sm label-success"> {{$admission->result }} </span></td>
                                <td>{{$admission->user->admissions->gender }}</td>
                                <td>{{$admission->user->admissions->phone }}</td>
                                <td>{{$admission->user->admissions->email }}</td>
                                <td>({{$admission->correct_questions }} / {{ $admission->number_of_questions }})</td>
                                <td>{{$admission->percentage }} %</td>
                                @if($admission->user->admissions->work==1)
                                    <td>
                                        <span class="label label-sm label-success"> يعمل </span>
                                    </td>
                                @else
                                    <td >
                                        <span class="label label-sm label-warning"> لا يعمل </span>
                                    </td>
                                @endif
                                
                                <td>{{$admission->user->admissions->nationalities->country_arNationality }}</td>

                                <td>
                                    <a href="{{route('dashboard.addmission.show', $admission->user->admissions->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                    <i class="fa fa-edit"></i> عرض </a>
                                
                                </td>
                                <td>
                                    <a href="{{route('dashboard.addmission.subscriptionSuccess', $admission->user->admissions->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                                    <i class="fa fa-edit"></i> الموافقة </a>
                                   
                                </td>

                                
                                <td>
                                      
                                    <a href="{{route('dashboard.addmission.addmissionFail', $admission->user->admissions->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                        رفض 
                                    </a>

                                   
                                </td>

                            </tr>
                            @endif
                               
                               
                               
                                
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
          
        </div>
    </div>

@endsection
