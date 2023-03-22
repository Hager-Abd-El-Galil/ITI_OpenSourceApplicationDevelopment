@extends('layouts.app')

@section('title') Create Post @endsection

@section('content')
<form class='my-5' method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputTitle" class=" form-label fs-4">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title.." id="exampleInputTitle"
            required>
    </div>
    @error('title')
    <div class="alert alert-danger my-1">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <p class="fs-4">Description</p>
        <textarea class="form-control" id="floatingTextarea" name="description" style="height: 120px"
            required></textarea>
    </div>
    @error('description')
    <div class="alert alert-danger my-1">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="exampleInputCreator" class="form-label fs-4">Post Creator</label>
        <select class="form-select" name="post_creator" aria-label="Default select example">
            <option selected>Choose Post Creator</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>


@endsection