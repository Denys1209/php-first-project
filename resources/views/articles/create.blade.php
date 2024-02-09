@extends('layouts.app')
@section('title', 'create an article')

@section('content')
<div class="container">
    <h1>Create New Article</h1>

{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', ['class' => 'form-control-file']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('published_date', 'Published Date:') !!}
            {!! Form::date('published_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
