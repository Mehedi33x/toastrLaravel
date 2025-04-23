@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Please fix the following:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5">{{ old('content', $post->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
