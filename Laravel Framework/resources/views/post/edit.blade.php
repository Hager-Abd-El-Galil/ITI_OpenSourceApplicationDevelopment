@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')
<form class='my-5' action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputTitle" class=" form-label fs-4">Title</label>
        <input type="text" class="form-control" placeholder="Enter Post Title.." id="exampleInputTitle"
            pattern="^[A-Za-z]+$" required>
    </div>
    <div class="form-floating mb-3">
        <p class="fs-4">Description</p>
        <textarea class="form-control" id="floatingTextarea" style="height: 120px" required></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputCreator" class="form-label fs-4">Post Creator</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Choose Post Creator</option>
            <option value="Hager">Hager</option>
            <option value="Aya">Aya</option>
            <option value="Alaa">Alaa</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection