@extends('layouts.master')
@section('title','View Post')

@section('body')
	<section id="backend-comments">
<h1>Comments <small>{{$post->comments->count()}} total</small></h1>
		<table id="table-1" class="uk-table uk-table-condensed">
			<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Comment</th>
			</tr>
			</thead>
			<tbody>
@foreach($post->comments as $comment)
			<tr>

				<td>{{$comment->name}}</td>
				<td>{{$comment->email}}</td>
				<td>{{$comment->comment}}</td>
			</tr>
	@endforeach




			</tbody>

		</table>
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

						<tr>

							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->slug}}</td>
							<td>{{$post->Author->name}}</td>
							<td>{{date('M j, Y',strtotime($post->created_at))}}</td>
							<td class="uk-link"><a href="{{route('post.edit',$post->id)}}" class="uk-button uk-button-danger">Edit Post</a></td>
						</tr>
					



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


		</div>
	</section>
@if(Auth::check())
<div class="edit-button">
	{!! Html::linkRoute('post.edit','Edit Post',array($post->id),array('class'=>'uk-button uk-button-primary uk-text-center'))!!}
</div>
@endif
@endsection
