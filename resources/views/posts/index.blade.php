@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this post?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
