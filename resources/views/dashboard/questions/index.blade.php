@extends('layout.dashboard.app')

@section('content')


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>بنك الأسئلة</span>
            </li>
        </ul>

    </div>
    <h1 class="page-title">بنك الأسئلة</h1>
    <a href="{{route('dashboard.question.create')}}" class="btn green"> أضافة
        <i class="fa fa-plus"></i>
    </a>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>جدول عرض تفاصيل بنك الأسئلة</div>
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
                                <th><i class="fa fa-bookmark-o"></i> السؤال </th>
                                <th><i class="fa fa-calculator"></i> الأجابة الصحيحة </th>
                                <th><i class="fa fa-bookmark"></i> عرض </th>
                                <th><i class="fa fa-bookmark"></i> تعديل </th>
                                <th><i class="fa fa-bookmark"></i> حذف </th>
                             
                            </tr>
                            </thead>
                            <tbody>
                               
                            @foreach($questions as $index=>$question)
                                <tr>
                                    <td scope="row">{{ $index + 1}}</td>

                                    <td>{{$question->question }}</td>
                                    @foreach ($question->chooses as $answers)
                                        @if($answers->is_correct == 1)
                                            <td>{{$answers->answer }}</td>
                                        @endif
                                    @endforeach
                                    
                                   
                                    <td>
                                        <a href="{{route('dashboard.question.show', $question->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                                         عرض </a>
                                       
                                    </td>
                                   
                                    <td>
                                        <a href="{{route('dashboard.question.edit', $question->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> تعديل 
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" onclick="return confirm('Are you sure?')" action="{{route('dashboard.question.destroy', $question->id)}}"  style="display:inline" >
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button name="_method" new="hidden" value="DELETE" class="btn btn-outline btn-circle dark btn-sm black">
                                                <span class="fa fa-trash-o"></span> حذف
                                            </button>

                                        </form>
                                       
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
