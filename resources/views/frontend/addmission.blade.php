@extends('layout.frontend.main')
@section('content')
    <!--med_tittle_section-->
    <div class="med_tittle_section">
        <div class="med_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="med_tittle_cont_wrapper">
                        <div class="med_tittle_cont">
                            <h1> {{ __('messages.ADMISSION') }}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('index')}}">{{ __('messages.home') }}</a>
                                </li>
                                <li>{{ __('messages.ADMISSION') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- med_tittle_section End -->

    <div class="login_wrapper_top float_left">
        <div class="login_overlay"></div>
        <div class="container">
            <div class="row">
               
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="login_tab_top_wrap float_left">
                        <div class="btn_log">
                            <a href="#">{{ __('messages.yourinformation') }}</a>
                        </div>
                        <form action="{{ route('addmissioncreate') }}" method="POST" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="login_wrapper" style="display: flex; flex-wrap: wrap;">
                                <div class="formsix-pos col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group ">
                                        <label for="formGroupExampleInput">{{ __('messages.AddFullName') }}</label>
                                        <input type="text" class="form-control" name="name" required="" placeholder="{{ __('messages.name') }}">
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group ">
                                        <label for="formGroupExampleInput">{{ __('messages.ChooseNationality') }}</label>
                                        <select class=" form-control" required name="nationality_id" id="inputGroupSelect01">
                                            @if(app()->getLocale() == 'ar')
                                                @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}">{{ $nationality->country_arNationality }}</option>
                                                    
                                                @endforeach
                                            @else
                                                @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}">{{ $nationality->country_enNationality }}</option>
                                                    
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddYourPhoneNumber') }}</label>
                                    <input type="text" class="form-control" required name="phone" value="" placeholder="{{ __('messages.mobilenumber') }}">
                                </div>

                                 <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group ">
                                        <label for="formGroupExampleInput">{{ __('messages.countryofresidence') }}</label>
                                        <select class=" form-control" required name="Country_id" id="inputGroupSelect01">

                                            @if(app()->getLocale() == 'ar')
                                                @foreach ($countries as $nationality)
                                                    <option value="{{ $nationality->id }}">{{ $nationality->country_arName }}</option>
                                                    
                                                @endforeach
                                            @else
                                                @foreach ($countries as $nationality)
                                                    <option value="{{ $nationality->id }}">{{ $nationality->country_enName }}</option>
                                                    
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddBirthDate') }}</label>
                                    <input type="date" class="form-control" required name="birth_date" value="" placeholder="{{ __('messages.BirthDate') }}">
                                </div>
                                
                                
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddYourEmail') }}</label>
                                    <input type="text" class="form-control" required name="email" value="" placeholder="{{ __('messages.email') }}">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddYourNationalID') }}</label>
                                    <input type="text" class="form-control" required name="national_id" value="" placeholder="{{ __('messages.NationalID') }}">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.Gender') }}</label>
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="gender" value="male" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ __('messages.Male') }}
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            {{ __('messages.Female') }}
                                        </label>
                                    </div>
                                   
                                </div>
                               <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.UploadYourPortofolio') }}</label>
                                
                                    <div class="custom-file">
                                        <input type="file" required class="custom-file-input form-control pic_file " name="img" id="inputGroupFile01">
                                        <label id="pic_val" class="custom-file-label" for="inputGroupFile01">{{ __('messages.YourPortofolio') }}</label>
                                    </div>
                                </div>

                                {{-- perant --}}

                                <div class="form-group  col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.ChooseYourSpecialization') }}</label>
                                    <select  class=" form-control testing" required name="specialization_id" id="inputGroupSelect01">
                                    
                                        @foreach ($specializations as $index=>$specialization)

                                         
                                            <option  value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                            

                                        @endforeach
                                       
                                    </select>
                                </div>

                                

                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddUniversityName') }}</label>
                                    <input type="text" class="form-control" required name="university" value="" placeholder="{{ __('messages.UniversityName') }}">
                                </div>

                                {{-- child --}}

                                <div class="form-group mrd_sec col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 "  >
                                    <label for="formGroupExampleInput">MRD</label>
                                    <select class=" form-control" required name="specialization_children_id" id="inputGroupSelect01">
                                        
                                        @foreach ($SpecializationChilds as $specialization)

                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                      
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddGraduationYear') }}</label>
                                    <input type="date" class="form-control" required name="graduation" value="" placeholder="{{ __('messages.GraduationYear') }}">
                                </div>

                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.UploadYourCV') }}</label>
                                    <div class="custom-file ">
                                        <input type="file" required class="custom-file-input form-control consumeFile" name="filepdf" id="inputGroupFile01">
                                        <label id="consume" class="custom-file-label" for="inputGroupFile01">{{ __('messages.YourCV') }}</label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.Areyouwork') }}</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="work" value="1" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ __('messages.work') }}
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="work" value="0" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            {{ __('messages.Idonotwork') }}
                                        </label>
                                    </div>
                                   
                                </div>
                                
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.AddYourExperienceYears') }}</label>
                                    <input type="number" class="form-control" name="experience" value="" placeholder="{{ __('messages.ExperienceYears') }}">
                                </div>

                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="formGroupExampleInput">{{ __('messages.ChooseTypeofemployment') }}</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="employment" value="governmental" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ __('messages.governmental') }}
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="employment" value="non-governmental" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            {{ __('messages.non-governmental') }}
                                        </label>
                                    </div>
                                  
                                </div>
                              
                                
                                
                            
                                <div class="header_btn inner_btn login_btn log float_left">
                                    <button type="submit" class="btn btn-success">{{ __('messages.send') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
