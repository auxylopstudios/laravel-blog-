@extends('layouts.master')
@section('title','Admin | Dashboard')

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
    <section id="analytics">
        <div class="uk-grid">
            <div class="uk-width-1-2">
                <div class="uk-panel uk-panel-box uk-panel-box-secondary posts">

                    <canvas id="lineChart" width="400" height="275"></canvas>

                </div>
            </div>
            <div class="uk-width-1-2">
                <div class="uk-panel uk-panel-box uk-panel-box-secondary traffic">

                    <canvas id="myDoughnutChart" width="400" height="265"></canvas>


                </div>
            </div>
        </div>
    </section>
    <section id="posts-list">
        <div class="uk-panel uk-panel-box uk-panel-box-secondary posts">
            <ul class="uk-tab" data-uk-tab data-uk-switcher="{connect:'#switch-from-content'}">
                <li class="uk-active"><a href="#">Posts</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Notifications</a></li>
            </ul>
            <div id="switch-from-content" class="uk-switcher">
                <table id="table-1" class="uk-table uk-table-condensed" data-uk-switcher-item="0">
                    <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Post Title</th>
                        <th>Slug</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($post as $posts)
                    <tr>

                        <td>{{$posts->id}}</td>
                        <td>{{$posts->title}}</td>
                        <td>{{$posts->slug}}</td>
                        <td>{{$posts->Author->name}}</td>
                        <td>{{date('M j, Y',strtotime($posts->created_at))}}</td>
                        <td class="uk-link"><a href="{{route('post.edit',$posts->id)}}" class="uk-button uk-button-danger">Edit Post</a></td>
                    </tr>
                    @endforeach



                    </tbody>

                </table>

                <div class="uk-switcher-2">
                    <table id="table-2" class="uk-table uk-table-hover uk-table-striped uk-table-condensed" data-uk-switcher-item="1">
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
                            <td>Gideon</td>
                            <td><a href="">auxylopstudios@gmail.com</a></td>
                            <td>Administrator</td>
                            <td class="uk-button-link"><a href="edit-user.html" class="uk-button uk-button-large uk-button-danger uk-button-link">Edit Detail</a></td>
                        </tr>

                        </tbody>
                    </table>

                </div>

            </div>
            {!!$post->links()  !!}

        </div>
    </section>
    <script src="{{asset( 'js/Chart.bundle.min.js' )}}"></script>
    <script src="{{asset( 'js/tinymce.min.js' )}}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    @endsection