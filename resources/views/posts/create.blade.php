@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Create Post</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Please fix the following issues:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
