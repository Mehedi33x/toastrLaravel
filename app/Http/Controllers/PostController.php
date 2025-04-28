<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1);
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        ToastMagic::success('Post created successfully');
        return to_route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());
        ToastMagic::success('Post updated successfully');
        return to_route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        ToastMagic::success('Post deleted successfully');
        return to_route('posts.index');
    }
}
