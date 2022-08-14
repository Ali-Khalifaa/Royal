@extends('layout.dashboard.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>التقديمات الجديدة </span>
            </li>
        </ul>

    </div>
    
    <div class="row">
        <div class="col-md-12">
           
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp sbold">عرض تفاصيل المتقدم الجديد</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-hover table-striped table-bordered">
                        <tbody><tr>
                            <td> الصورة الشخصية </td>
                            <td>
                                <img class="image" src="{{asset('uploads/addmission/img/'.$admission->img)}}"  alt="Image" style="width:100px;height:100px;margin-left:320px;">  
                            </td>
                        </tr>
                        <tr>
                            <td> الأسم </td>
                            <td>
                                <h5> {{ $admission->name }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> رقم الهاتف </td>
                            <td>
                                <h5> {{ $admission->phone }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> تاريخ الميلاد </td>
                            <td>
                                <h5> {{ $admission->birth_date }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> الجنس </td>
                            <td>
                                <h5> {{ $admission->gender }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> تاريخ التخرج </td>
                            <td>
                                <h5> {{ $admission->graduation }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> البريد الألكترونى </td>
                            <td>
                                <h5> {{ $admission->email }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> الرقم القومى </td>
                            <td>
                                <h5> {{ $admission->national_id }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> الجنسية </td>
                            <td>
                                <h5> {{$admission->nationalities->country_enNationality }} </h5>
                            </td>
                        </tr>

                        <tr>
                            <td> البلد المقيم بها </td>
                            <td>
                                <h5> {{$admission->countries->country_enName }} </h5>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> الجامعه التى درس بها </td>
                            <td>
                                <h5> {{ $admission->university }} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td> التخصص </td>
                            <td>
                                <h5> {{$admission->specializations->name }} </h5>
                            </td>
                        </tr>
                        @if($admission->specializations->id == 3)
                        <tr>
                            <td> التخصص الفرعى </td>
                            <td>
                                <h5> {{$admission->SpecializationChild->name }} </h5>
                            </td>
                        </tr>
                        @endif
                       
                        <tr>
                            <td> حالة العمل </td>
                            @if($admission->work==1)
                                <td>
                                    <span class="label label-sm label-success"> يعمل </span>
                                </td>
                            @else
                                <td >
                                    <span class="label label-sm label-warning"> لا يعمل </span>
                                </td>
                            @endif
                        </tr>
                        @if($admission->work==1)

                            <tr>
                                <td> جهة العمل اذا كان يعمل </td>
                                <td>
                                    <h5> {{ $admission->employment }} </h5>
                                </td>
                            </tr>

                            <tr>
                                <td> الخبرة </td>
                                <td>
                                    <h5> {{ $admission->experience }} </h5>
                                </td>
                            </tr>

                        @endif
                        <tr>
                            <td> السيرة الذاتية </td>
                            <td>
                                <a class="btn blue btn-outline sbold" data-toggle="modal" target="plank" href="{{asset('uploads/addmission/pdf/'.$admission->c_v)}}"> مشاهدة ملف السيرة الذاتية </a>
                            </td>
                        </tr>
                        <tr>
                            <td> موعد المقابلة الأولى </td>
                            <td>
                                <h5> {{ $admission->users->interview_one }} </h5>  
                            </td>
                        </tr>
                        <tr>
                            <td> مكان المقابلة الشخصية الأولى </td>
                            <td>
                                <h5> {{ $admission->users->plase_interview_one }} </h5>                            
                            </td>
                        </tr>
                        <tr>
                            <td> موعد المقابلة الشخصية الثانية </td>
                            <td>
                                <h5> {{ $admission->users->interview_two }} </h5>  
                            </td>
                        </tr>
                        <tr>
                            <td> مكان المقابلة الشخصية الثانية </td>
                            <td>
                                <h5> {{ $admission->users->plase_interview_two }} </h5>                            
                            </td>
                        </tr>
                        <form method="POST" action="{{route('dashboard.addmission.changeStepTwo',$admission->id)}}"  role="form" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('put')}}
                            <tr>
                                <td>  تغيير موعد المقابلة الشخصية الثانية </td>
                                <td>
                                    <input type="datetime-local" name="interview_two" required>
                                </td>
                            </tr>
                            <tr>
                                <td> تغير مكان المقابة الشخصية الثانية</td>
                                <td>
                                    <input type="text" name="plase_interview_two" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                
                                <td>
                                    <button class="btn blue btn-outline sbold" type="submit">ارسال</button>
                                </td>
                            </tr>
                            
                        </form>
                        
                      
                    </tbody></table>
                    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal Title</h4>
                                </div>
                                <div class="modal-body"> Modal body goes here </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal Title</h4>
                                </div>
                                <div class="modal-body"> Modal body goes here </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal Title</h4>
                                </div>
                                <div class="modal-body"> Modal body goes here </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal Title</h4>
                                </div>
                                <div class="modal-body"> Modal body goes here </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Responsive &amp; Scrollable</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Some Input</h4>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Some More Input</h4>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                <p>
                                                    <input type="text" class="col-md-12 form-control"> </p>
                                            </div>
                                        </div>
                                    </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--DOC: Aplly "modal-cached" class after "modal" class to enable ajax content caching-->
                    <div class="modal fade" id="ajax" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                                    <span> &nbsp;&nbsp;Loading... </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->
                    <div id="stack1" class="modal fade" tabindex="-1" data-width="400">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Stack One</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Some Input</h4>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                        </div>
                                    </div>
                                    <a class="btn green" data-toggle="modal" href="#stack2"> Launch modal </a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="button" class="btn red">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="stack2" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Stack Two</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Some Input</h4>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="button" class="btn yellow">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Would you like to continue with some arbitrary task? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn green">Continue Task</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">A Fairly Long Modal</h4>
                                </div>
                                <div class="modal-body">
                                    <img style="height: 800px" alt="" src="http://i.imgur.com/KwPYo.jpg"> </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade draggable-modal ui-draggable" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header ui-draggable-handle">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Start Dragging Here</h4>
                                </div>
                                <div class="modal-body"> Modal body goes here </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
