<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::withTrashed()->paginate(5);
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

    public function update(storePostRequest $request)
    {
        $id = request()->id;
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        Post::where('id', $id)->update([
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $description,
            'user_id' => $postCreator,
        ]);
        return to_route('posts.index');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();
        return redirect()->back();
    }
}
