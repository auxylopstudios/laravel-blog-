@extends('layouts.auth')
@section('title','Login')

@section('body')
    <section id="login-form">
        <div class="inner">
            <div class="uk-panel uk-panel-box bg-color">
                <h2 class="uk-text-center">LOGIN</h2>
            </div>
            <div class="uk-panel uk-panel-box shadow">
                @if(Session::has('success'))
                    <h3 class="success uk-form-success">
                        POST SAVED
                    </h3>
                @endif
                {!! Form::open(['url' => '/login','class'=>'uk-form']) !!}
                <div class="uk-form-row {{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="uk-form-icon">
                        <i class="uk-icon-envelope"></i>

                        {{Form::email('email',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Email'])}}
                    </div>
                </div>
                <div class="uk-form-row {{ $errors->has('password') ? ' has-error' : '' }}">
                    @if ($errors->has('password'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <div class="uk-form-icon">
                        <i class="uk-icon-key"></i>
                        {{Form::password('password',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Password'])}}
                    </div>
                </div>
                <div class="uk-form-row">

                    {{Form::checkbox('remember', 'remember')}}
                    <span>Remember Me</span>
                </div>
                <div class="uk-form-row">
                    {{Form::submit('Login',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}
                    <span><a href="">Forgot Password?</a></span>


                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
