@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="container">
    <h1>All Articles</h1>
    <ul class="list-group">
        @foreach ($articles as $article)
            <li class="list-group-item">
                <a href="{{ route('articles.show', $article->id) }}"> <!-- Wrap the content in an anchor tag -->
                    <h5>{{ $article->title }}</h5>
                    <p>{{ Str::limit($article->content, 144) }}...</p>
                    <small class="text-muted">Published on {{ $article->published_date }}</small>
                </a>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
