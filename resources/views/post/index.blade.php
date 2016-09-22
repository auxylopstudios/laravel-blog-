@extends('layout.dashlayout')
@section('title','Dashboard-Index')

@section('body')
    @if(Auth::check())
    @include('partials._dashnav')
<section id="dashboard-sidebar">

    <div class="uk-grid">
        <div class="uk-width-medium-1-4 left-sidebar">
    <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: false }">
        <li class="uk-parent"><a href="#">CONTENT</a>
            <ul class="uk-nav-sub">
                <li><a href="{{route('posts.create')}}"><i class="uk-icon-plus"></i> New Article</a></li>

                <li><a href="docs/base.html"><i class="uk-icon-edit"></i> Edit Articles</a></li>

                <li><a href="#"><i class="uk-icon-list"></i> Categories</a></li>

                <li><a href="#"><i class="uk-icon-tags"></i> Tags</a></li>
            </ul>
        </li>

        <li class="uk-parent"><a href="#"> USERS</a>
            <ul class="uk-nav-sub">
                <li><a href="#"><i class="uk-icon-user-plus"></i> Add New User</a></li>

                <li><a href="#"><i class="uk-icon-users"></i> Users</a></li>
                <li><a href="#"><i class="uk-icon-user-secret"></i> User Profile</a></li>
            </ul>
        </li>
        <li class="uk-parent"><a href="#">MEDIA</a>
            <ul class="uk-nav-sub">
                <li><a href="docs/base.html"><i class="uk-icon-folder-o"></i> Gallery</a></li>

                <li><a href="docs/base.html"><i class="uk-icon-file-audio-o"></i> Audio</a></li>

                <li><a href="#"><i class="uk-icon-file-movie-o"></i> Video</a></li>

            </ul>
        </li>
        <li class="uk-parent"><a href="#">ADMIN</a>
            <ul class="uk-nav-sub">
                <li><a href="docs/base.html"><i class="uk-icon-sliders"></i> Options</a></li>

                <li><a href="docs/base.html"><i class="uk-icon-unlock-alt"></i> Security</a></li>

                <li> <a href="{{ route('logout') }}"><i class="uk-icon-toggle-off"></i> Logout</a></li>

            </ul>
        </li>
        </ul>
        </div>
        <div class="uk-width-medium-3-4 dashboard-sidebar-right">
<div class="post_form uk-panel">
    <div class="uk-alert uk-alert-success"><i class="uk-icon-exclamation-circle"></i>    <span class="size-26">WELCOME Mr.{{Auth::user()->name}}</span></div>

    <div class="uk-panel-box">
        CREATE A NEW POST
    </div>
            {!! Form::open() !!}
            <div class="uk-form-row">
                {{Form::label('title', 'Post Title', ['class' => 'uk-form-label'])}}
                <div class="uk-form-controls">
                    {{Form::text('title', null, ['class' => 'uk-form-medium','id'=>'title'])}}
                </div>
            </div>
            <div class="uk-form-row">
                {{Form::label('body', 'Content', ['class' => 'uk-form-label'])}}
                <div class="uk-form-controls">
                    {{Form::textarea('body', null, ['class' => 'uk-form-medium','id'=>'body'])}}
                </div>
            </div>
            <div id="upload-drop" class="uk-placeholder uk-text-center">
                <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i> Attach featured images by dropping them here or <a class="uk-form-file">selecting one<input id="upload-select" type="file"></a>.
            </div>

            <div id="progressbar" class="uk-progress uk-hidden">
                <div class="uk-progress-bar" style="width: 0%;">0%</div>
            </div>
    <div class="uk-form-row">
        <div class="uk-form-controls">
            {{Form::label('Category', 'Category', ['class' => 'uk-form-label'])}}
            {{ Form::select('Category', ['A' => 'Article','F' => 'Freebies', 'S' => 'Tutorials'],'A') }}
        </div>
    </div>
            <div class="uk-form-row">
                <div class="uk-form-controls">
                    {{ Form::submit('Publish',['class'=>'uk-button uk-button-primary']) }}
                </div>
            </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>
  @endif
@endsection
