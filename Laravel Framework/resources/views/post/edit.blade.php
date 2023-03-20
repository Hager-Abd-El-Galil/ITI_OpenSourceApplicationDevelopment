@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')
<form class='my-5' action="{{route('posts.update',['post' => $post['id']])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $post['id'] }}" class=" form-control">
    <div class="mb-3">
        <label for="exampleInputTitle" class=" form-label fs-4">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $post['title'] }}"
            placeholder="Enter Post Title.." id=" exampleInputTitle" pattern="^[A-Za-z]+$" required>
    </div>

    @error('title')
    <div class="alert alert-danger my-1">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <p class="fs-4">Description</p>
        <textarea class="form-control" id="floatingTextarea" style="height: 120px" name="description"
            required>{{ $post['description'] }}</textarea>
    </div>
    @error('description')
    <div class="alert alert-danger my-1">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="exampleInputCreator" class="form-label fs-4">Post Creator</label>
        <select class="form-select" name="post_creator" aria-label="Default select example">
            <option value="{{ $post['user_id'] }}" selected hidden>
                @if($post->user)
                {{$post->user->name}}
                @else
                Unknown
                @endif
            </option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection