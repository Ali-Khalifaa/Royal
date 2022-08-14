@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>بنك الأسئلة </span>
            </li>
        </ul>

    </div>
    
    <div class="row">
        <div class="col-md-12">
           
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp sbold">عرض تفاصيل السؤال</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-hover table-striped table-bordered">
                        <tbody><tr>
                            <td> السؤال </td>
                            <td>
                                <h5>{{ $question->question}}</h5>
                            </td>
                        </tr>
                        @foreach ($question->chooses as $index=>$answers)
                            @if($index == 0)
                                <tr>
                                    <td> الأجابة : A </td>
                                    <td>
                                        <h5> {{ $answers->answer }} </h5>
                                    </td>
                                </tr>
                            @endif
                            @if($index == 1)
                                <tr>
                                    <td> الأجابة : B </td>
                                    <td>
                                        <h5> {{ $answers->answer }} </h5>
                                    </td>
                                </tr>
                            @endif
                            @if($index == 2)
                                <tr>
                                    <td> الأجابة : C </td>
                                    <td>
                                        <h5> {{ $answers->answer }} </h5>
                                    </td>
                                </tr>
                            @endif
                            @if($index == 3)
                                <tr>
                                    <td> الأجابة : D </td>
                                    <td>
                                        <h5> {{ $answers->answer }} </h5>
                                    </td>
                                </tr>
                            @endif
                            @if($index == 4)
                                <tr>
                                    <td> الأجابة : E </td>
                                    <td>
                                        <h5> {{ $answers->answer }} </h5>
                                    </td>
                                </tr>
                            @endif
                            @if($answers->is_correct == 1)
                                <tr>
                                    <td> الأجابة الصحيحة </td>
                                    <td>
                                        <h5> {{ $answers->answer }} </h5>
                                    </td>
                                </tr>
                            @endif
                               
                         
                                
                        @endforeach
                       
                        
                    </tbody></table>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="{{route('dashboard.question.index')}}" class="btn default">الغاء</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
