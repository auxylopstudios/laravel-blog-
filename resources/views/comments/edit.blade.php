@extends('layouts.master')
@section('title','Dashboard | Edit Post')

@section('body')
    @include('partials._dashnav')
    <section id="social-media-grid">




        <div class="uk-grid">
            <div class="uk-width-1-4 ">
                <div class="uk-panel uk-panel-box uk-panel-box-secondary comments">
                    <span class="comments-span"><i class="uk-icon-comments"></i></span>
                    <span class="comments-span-number">200</span><br>Comments
                </div>
            </div>
            <div class="uk-width-1-4 ">
                <div class="uk-panel uk-panel-box uk-panel-box-secondary tweet">
                    <span class="comments-span"><i class="uk-icon-twitter"></i></span>
                    <span class="comments-span-number">250</span><br>Tweets
                </div>
            </div>
            <div class="uk-width-1-4 ">
                <div class="uk-panel uk-panel-box uk-panel-box-secondary likes">
                    <span class="comments-span"><i class="uk-icon-facebook"></i></span>
                    <span class="comments-span-number">300</span><br>Likes
                </div>
            </div>
            <div class="uk-width-1-4 ">
                <div class="uk-panel uk-panel-box uk-panel-box-secondary github">
                    <span class="comments-span"><i class="uk-icon-github"></i></span>
                    <span class="comments-span-number">240 </span><br>Users
                </div>
            </div>
        </div>

    </section>
    <section id="comments">
        <div class="comment-form">
            {!! Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT','class'=>'uk-form']) !!}
            <div class="uk-form-row {{ $errors->has('title') ? ' has-error' : '' }}">
                @if ($errors->has('name'))
                    <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                {{Form::text('name',null,['class'=>'uk-form-controls','disabled'=>'','id'=>'posttitle','placeholder'=>'Name'])}}
            </div>
            <div class="uk-form-row {{ $errors->has('email') ? ' has-error' : '' }}">
                @if ($errors->has('email'))
                    <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                {{Form::email('email',null,['class'=>'uk-form-controls','disabled'=>'','id'=>'posttitle','placeholder'=>'Email'])}}
            </div>
            <div class="uk-form-row {{ $errors->has('comment') ? ' has-error' : '' }}">
                @if ($errors->has('comment'))
                    <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                @endif
                {{Form::textarea('comment',null,['class'=>'uk-form-controls','id'=>'posttitle','cols'=>'30','rows'=>'5','placeholder'=>'Comment'])}}
            </div>
            <div class="uk-form-row">
                {{Form::submit('Update Comment',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}

            </div>
        </div>
    </section>
@endsection
