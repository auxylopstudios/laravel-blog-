@extends('layouts.auth')
@section('title','Register')

@section('body')
    <section id="login-form">
        <div class="inner">
            <div class="uk-panel uk-panel-box bg-color">
                <h2 class="uk-text-center">REGISTER</h2>
            </div>
            <div class="uk-panel uk-panel-box shadow">
                @if(Session::has('success'))
                    <h3 class="success">
                        POST SAVED
                    </h3>
                @endif
                {!! Form::open(['url' => '/register','class'=>'uk-form']) !!}
                    <div class="uk-form-row {{ $errors->has('name') ? ' has-error' : '' }}">
                        @if ($errors->has('name'))
                            <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                        @endif
                        {{Form::text('name',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Name'])}}
                    </div>
                <div class="uk-form-row {{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    {{Form::email('email',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Email'])}}
                </div>
                <div class="uk-form-row {{ $errors->has('password') ? ' has-error' : '' }}">
                    @if ($errors->has('password'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    {{Form::password('password',['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Password'])}}
                </div>
                    <div class="uk-form-row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        @if ($errors->has('password_confirmation'))
                            <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                        @endif
                        {{Form::password('password_confirmation',['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Confirm Password'])}}
                    </div>
                <div class="uk-form-row">
                    {{Form::submit('Register',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}



                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
