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
    <section id="post-form">
        <div class="uk-panel uk-panel-box bg-color">
            <h2 class="uk-text-center">EDIT POST</h2>
        </div>
        <div class="uk-panel uk-panel-box shadow">
            {!! Form::model($post,['route'=>['post.update',$post->id],'method'=>'PUT','files'=>true,'class'=>'uk-form']) !!}
            <div class="uk-form-row">
                {{Form::text('title',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Post Title Here'])}}
            </div>
            <div class="uk-form-row {{ $errors->has('slug') ? ' has-error' : '' }}">
                @if ($errors->has('slug'))
                    <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
                {{Form::text('slug',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Slug Here'])}}
            </div>
            <div class="uk-form-row">
                {{Form::textarea('content',null,array('class'=>'uk-form-controls','cols'=>'30','rows'=>'10','placeholder'=>'Content Here'))}}
            </div>
            <div class="uk-form-row">
                Update Featured image
                {{Form::file('featured_image')}}
            </div>
            <div class="uk-form-row">
                '                {{Form::submit('Update Post',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}


                <div class="select">
                    CATEGORY
                    {{Form::select('category_id',$categories,null,['class'=>'uk-form-control'])}}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </section>
    <script src="{{asset( 'js/tinymce.min.js' )}}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection
