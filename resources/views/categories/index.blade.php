@extends('layouts.master')
@section('title','Dashboard | All Categories')

@section('body')
    @include('partials._dashnav')
    <section id="category-section">
<div class="uk-grid">
<div class="uk-width-3-4">
    <table id="table-3" class="uk-table">
        <thead>
        <tr>
            <th>Post ID</th>
            <th>Category Name</th>

        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>

                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <div class="uk-width-1-4">
        {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
        <div class="uk-form-row">
            <h2>New Category</h2>
            {{Form::label('name','Name')}}
            {{Form::text('name',null,['class'=>'uk-form-controls','placeholder'=>'Enter Category Name'])}}
        </div>
        <div class="uk-form-row">
            {{Form::submit('Create Category',['class'=>'uk-form-control uk-button uk-button-large uk-button-primary'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
    </section>
    @endsection