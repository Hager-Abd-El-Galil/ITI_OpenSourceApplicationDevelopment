<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();

        foreach($allPosts as $post){
            $response [] = [
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
            ];
        }
        return PostResource::collection($allPosts);
    }

    public function show($post)
    {
        $post =  Post::find($post);
        return new PostResource($post);
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

        return new PostResource($post);
    }
}