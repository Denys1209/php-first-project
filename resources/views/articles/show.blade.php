@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="img-fluid">
    @endif
    <p><small class="text-muted">Published on {{ $article->published_date }}</small></p>
</div>
@endsection
