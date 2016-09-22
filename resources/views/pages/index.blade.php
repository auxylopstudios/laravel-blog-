@extends('layouts.master')
@section('title','Blog | Home')

@section('body')
    @include('partials._blognav')
    <section id="intro-text">

        <h1 class="uk-text-center">news blog</h1>
    </section>
    <section id="blog-container">
        <div class="uk-grid">
            @foreach($post as $posts)
            <div class="uk-width-1-3">
<div class="image-container">
    @if($posts->image)
        <img  src="{{asset('img/' . $posts->image)}}"  alt="{{$posts->title}}">
    @endif

                <div class="article-container">

                    <a href="{{url('blog/'.$posts->slug)}}" class="uk-text-center">
                       {{$posts->title}}
                    </a>
                    <p class="uk-article-meta uk-text-center">{{date('F jS, Y',strtotime($posts->created_at))}}</p>
                </div>
</div>
            </div>
                @endforeach
                {!!$post->links()  !!}


        </div>

    </section>


@endsection