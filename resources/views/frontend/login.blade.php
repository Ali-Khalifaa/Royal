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
                        <h1>{{ __('messages.loginsiunup') }} </h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}">{{ __('messages.home') }}</a>
                            </li>
                            <li>{{ __('messages.loginsiunup') }}</li>
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
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="login_tab_top_wrap float_left">
                    <div class="btn_log">
                        <a href="#">{{ __('messages.LOGIN') }}</a>

                    </div>
                    <form class="login-form" action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="login_wrapper  float_left">

                            <div class="formsix-pos">
                                <div class="form-group i-email">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" required="" placeholder="{{ __('messages.email') }}" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
    
                            <div class="formsix-e">
                                <div class="form-group i-password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" required="" name="password" id="password2" autocomplete="current-password" placeholder="{{ __('messages.Password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="login_remember_box">
                                <label class="control control--checkbox">{{ __('messages.Rememberme') }}
                                    <input type="checkbox" name="remember" value="1">
                                    <span class="control__indicator"></span>
                                </label>
                                <!-- <a href="#" class="forget_password">Forgot Password</a> -->
                            </div>
                            <div class="header_btn inner_btn login_btn log float_left">

                                <button type="submit" class="btn green pull-right"> {{ __('messages.LOGIN') }} </button>
                        
                            </div>
                           
                        </div>
                    </form>

                    
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="login_tab_top_wrap float_left">
                    <div class="btn_log">
                        <a href="#">{{ __('messages.Register') }}</a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login_wrapper float_left">
                            <div class="formsix-pos">
                                <div class="form-group i-email">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" required="" name="name" value="{{ old('name') }}" placeholder="{{ __('messages.name') }}"  required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" placeholder="{{ __('messages.email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-group i-password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" required="" id="password3" name="password" placeholder="{{ __('messages.Password') }} " required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="formsix-e">
                                <input  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="" placeholder="{{ __('messages.Password') }}">
                            </div>

                            {{-- <div class="login_remember_box">
                                <label class="control control--checkbox">I agreed to the Terms and Conditions.
                                    <input type="checkbox">
                                    <span class="control__indicator"></span>
                                </label>
                            </div> --}}

                            <div class="header_btn inner_btn login_btn log float_left">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection