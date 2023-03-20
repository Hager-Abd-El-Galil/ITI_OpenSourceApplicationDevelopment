<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(5);
        return view('post.index', ['posts' => $allPosts]);
    }

    public function show($id)
    {
        $post =  Post::find($id);
        $comments = $post->comments;
        return view('post.show', ['post' => $post,'comments' => $comments]);
    }

    public function create()
    {
        $users = User::all();
        return view('post.create',['users' => $users]);
    }

    public function edit($id)
    {
        $users = User::all();
        $post = Post::find($id);

        return view('post.edit', ['post' => $post,'users' => $users]);
    }

    public function store(StorePostRequest $request)
    {
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        return to_route('posts.index');
    }

    public function update(StorePostRequest $request)
    {
        $id = request()->id;
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        Post::where('id', $id)->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator
        ]);
        return to_route('posts.index');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return to_route('posts.index');
    }
}