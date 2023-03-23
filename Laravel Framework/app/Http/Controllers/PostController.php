<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::withTrashed()->paginate(5);
        return view('post.index', ['posts' => $allPosts]);
    }

    public function show($post)
    {
        $post =  Post::find($post);
        $comments = $post->comments;
        return view('post.show', ['post' => $post,'comments' => $comments]);
    }

    public function create()
    {
        $users = User::all();
        return view('post.create',['users' => $users]);
    }

    public function edit($post)
    {
        $users = User::all();
        $post = Post::find($post);

        return view('post.edit', ['post' => $post,'users' => $users]);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' =>  $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::putFileAs('public/posts', $image, $filename);
            $post->image_path = $path;
            $post->save();
        }

        return to_route('posts.index')->with('success', 'A Post is Created Successfully!');
    }

    public function update($post,storePostRequest $request)
    {
        $post = Post::findOrFail($post);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::putFileAs('public/posts', $image, $filename);
            $post->image_path = $path;
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);
        return to_route('posts.index')->with('success', 'A Post is Updated Successfully!');;
    }

    public function delete($post)
    {
        $post = Post::findOrFail($post);
        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->back()->with('success', 'A Post is Deleted Successfully!');;
    }

    public function restore($post)
    {
        $post = Post::withTrashed()->find($post);
        $post->restore();
        return redirect()->back()->with('success', 'A Post is Restored Successfully!');;
    }

    public function removeOldPosts()
    {
        PruneOldPostsJob::dispatch();
    }
}