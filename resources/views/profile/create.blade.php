@extends('layouts.master')
@section('title','Admin | Profile')

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
    <section id="avatar">
        <div class="avatar-content">
            <div class="avatar-content-image">
                <img src="{{asset('img/profile-pic.jpeg')}}" alt="">
                <span><b>Gideon/Profile</b><br>Edit your name,avatar etc</span>

            </div>
        </div>
    </section>
    <section id="posts-list">
        <div class="uk-panel uk-panel-box uk-panel-box-secondary posts">
            <ul class="uk-tab" data-uk-tab data-uk-switcher="{connect:'#switch-from-content'}">
                <li class="uk-active"><a href="#">Profile</a></li>
                <li><a href="#">Password</a></li>
                <li><a href="#">Notifications</a></li>
            </ul>
            <div id="switch-from-content" class="uk-switcher">
                {!! Form::open(['url' => '/profile','class'=>'uk-form']) !!}
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

                <div class="uk-form-row {{ $errors->has('website') ? ' has-error' : '' }}">
                    @if ($errors->has('website'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                    </span>
                    @endif
                    {{Form::url('website',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter Website URL'])}}
                </div>

                <div class="uk-form-row {{ $errors->has('twitter') ? ' has-error' : '' }}">
                    @if ($errors->has('twitter'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                    </span>
                    @endif
                    {{Form::text('twitter',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter twitter ID'])}}
                </div>
                <div class="uk-form-row {{ $errors->has('facebook') ? ' has-error' : '' }}">
                    @if ($errors->has('facebook'))
                        <span class="uk-form-help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
                    @endif
                    {{Form::text('facebook',null,['class'=>'uk-form-controls','id'=>'posttitle','placeholder'=>'Enter facebook ID'])}}
                </div>


                <div class="uk-form-row">
                    {{Form::submit('Create',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}


                </div>

                {!! Form::close() !!}
                <div class="uk-switcher-2">
                    <table id="table-2" class="uk-table uk-table-hover uk-table-striped uk-table-condensed"
                           data-uk-switcher-item="1">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Gideon Auxano</td>
                            <td><a href="">auxylopstudios@gmail.com</a></td>
                            <td>Administrator</td>
                            <td class="uk-button-link"><a href="edit-user.html"
                                                          class="uk-button uk-button-large uk-button-danger uk-button-link">Edit
                                    Detail</a></td>
                        </tr>
                        <tr>
                            <td>Dennis</td>
                            <td><a href="">dennistoday@mail.io</a></td>
                            <td>Editor</td>
                            <td><a href="edit-user.html" class="uk-button uk-button-large uk-button-danger">Edit
                                    Detail</a></td>
                        </tr>
                        <tr>
                            <td>RichyKing</td>
                            <td><a href="">richyrich@gmail.com</a></td>
                            <td>Contributor</td>
                            <td><a href="edit-user.html" class="uk-button uk-button-large uk-button-danger">Edit
                                    Detail</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>
    <script src="{{asset( 'js/Chart.bundle.min.js' )}}"></script>
@endsection
