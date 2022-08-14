@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>المقابلة الأولى </span>
            </li>
        </ul>

    </div>
    <h1 class="page-title"> المقابلة الأولى </h1>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">جدول عرض تفاصيل المقابلة الأولى </span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th> <i class="fa fa-cogs"></i></th>
                                <th><i class="fa fa-user"></i> الأسم </th>
                                <th><i class="fa fa-file-text-o"></i> ميعاد المقابلة  </th>
                                <th><i class="fa fa-file-text-o"></i> مكان المقابلة  </th>
                                <th><i class="fa fa-bookmark"></i> الجنس </th>
                                <th><i class="fa fa-phone"></i> الهاتف </th>
                                <th><i class="fa fa-at"></i> البريد الألكترونى </th>                
                                <th><i class="fa fa-file-text-o"></i>  حالة العمل </th>
                                <th><i class="fa fa-file-text-o"></i> الجنسية </th>
                                <th><i class="fa fa-bookmark"></i> عرض </th>
                                <th><i class="fa fa-bookmark"></i> تغير موعد المقابلة الأوبى</th>
                                <th><i class="fa fa-bookmark"></i> القبول وتحديد موعد المقابلة الثانية</th>
                                <th><i class="fa fa-bookmark"></i> القبول والتقدم الى الأمتحان </th>
                                <th><i class="fa fa-bookmark"></i> الرفض </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($admissions as $index=>$admission)
                                    <tr>
                                        <td scope="row">{{ $index + 1}}</td>
    
                                        <td>{{$admission->name }}</td>
                                        <td>{{$admission->users->interview_one }}</td>
                                        <td>{{$admission->users->plase_interview_one }}</td>
                                        <td>{{$admission->gender }}</td>
                                        <td>{{$admission->phone }}</td>
                                        <td>{{$admission->email }}</td>
                                       
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

                                        <td>
                                          
                                            <a href="{{route('dashboard.addmission.changinterviewone', $admission->id)}}" class="btn btn-transparent blue btn-outline btn-circle btn-sm">
                                                تغيير موعد الأنترفيو
                                            </a>

                                           
                                        </td>

                                        <td>
                                          
                                            <a href="{{route('dashboard.addmission.intertwo', $admission->id)}}" class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                قبول وتحديد الانترفيو الثانى 
                                            </a>

                                           
                                        </td>
                                        <td>
                                          
                                            <a href="{{route('dashboard.addmission.addmissionToExam', $admission->id)}}" class="btn btn-circle blue-steel btn-outline">
                                                التقدم الى الأمتحان 
                                            </a>

                                           
                                        </td>

                                        <td>
                                          
                                            <a href="{{route('dashboard.addmission.addmissionFail', $admission->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                رفض 
                                            </a>

                                           
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
