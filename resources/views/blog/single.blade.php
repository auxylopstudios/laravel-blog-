@extends('layouts.master')
<?php $title_tag = htmlspecialchars($post->title);

use Carbon\Carbon;

?>
@section('title',"Blog |$title_tag")

@section('body')
    @include('partials._blognav')
    <section id="intro-texts">

        <h1 class="uk-text-center">{{date('M j, Y',strtotime($post->created_at))}}</h1>
        <h2 class="uk-text-center">{{$post->title}}</h2>
        <span class="uk-text-center">by {{$post->Author->name}} / {{$post->category->name}}</span>
    </section>

    <section id="single-container">

        <div class="single-content">
            <div class="blog-featured-image">
                @if($post->image)
                    <img src="{{asset('img/' . $post->image)}}" class="uk-container-center uk-img-preserve"
                         alt="{{$post->title}}">
                @endif
                <div class="title-right">
                    <h1 class="uk-text-center">{{strtoupper($post->title)}}</h1>
                    <p class="uk-text-center">CREATED BY:</p>
                    <p class="uk-text-center">{{strtoupper($post->Author->name)}}</p>
                </div>
            </div>
            <p class="uk-article">{!!$post->content!!}</p>

        </div>
        @if(Auth::check())
            <div class="edit-button">
                {!! Html::linkRoute('post.edit','Edit Post',array($post->id),array('class'=>'uk-button uk-button-primary uk-text-center'))!!}
            </div>
        @endif
    </section>
    <section id="commentforeach">
        <div class="comment-icon">

            <h2><i class="uk-icon-comments"></i>

                @if($post->comments()->count()==0)
                    NO COMMENTS
                @elseif($post->comments()->count()==1)
                    {{$post->comments()->count()}} COMMENT
                @elseif($post->comments()->count()>1)
                    {{$post->comments()->count()}} COMMENTS
                @endif
            </h2>

        </div>
        <div class="comment">
            @foreach($post->comments as $comment)
                <?php
                $dt = Carbon::now();?>
                <div class="eachcomment">

                    <div class="photo">
                        <img src="" class="author-image" alt="">
                    </div>
                    <div class="timeposted">
                        <h5 class="h5">{{$comment->name}} |
                            {{$dt->parse($comment->created_at)->diffForHumans()}}
                        </h5>
                    </div>
                    <div class="commented">
                        {{ucfirst($comment->comment)}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section id="comments">
        <div class="comment-form">
            {{ Form::open(['route' => ['comments.store',$post->id],'class'=>'uk-form','method'=>'POST']) }}
            <div class="uk-form-row {{ $errors->has('title') ? ' has-error' : '' }}">
                @if ($errors->has('name'))
                    <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                {{Form::text('name',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Name'])}}
            </div>
            <div class="uk-form-row {{ $errors->has('email') ? ' has-error' : '' }}">
                @if ($errors->has('email'))
                    <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                {{Form::email('email',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Email'])}}
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
                {{Form::submit('Add Comment',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}

            </div>
        </div>
    </section>

@endsection