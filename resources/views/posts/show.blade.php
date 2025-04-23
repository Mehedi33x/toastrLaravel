@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <hr>
    <p><strong>Created at:</strong> {{ $post->created_at->format('d M Y H:i') }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
