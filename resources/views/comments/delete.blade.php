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
    <section id="delete-commment">
        <div class="alert-container">
            <h1>DELETE THIS COMMENT?</h1>
        </div>
        {{Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])}}
    {{Form::submit('YES',['class'=>'uk-button uk-button-warning'])}}
    </section>
    @endsection