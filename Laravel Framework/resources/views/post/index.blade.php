@extends('layouts.app')


@section('title') Home @endsection

@section('content')
<div class="text-center">
    <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($posts as $post)
        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['posted_by']}}</td>
            <td>{{$post['created_at']}}</td>
            <td>
                <x-button href="{{route('posts.show', $post['id'])}}" type="info" label="View" />
                <x-button href="{{route('posts.edit', $post['id'])}}" type="primary" label="Edit" />
                <x-button href="#" type="danger" label="Delete" />
            </td>
        </tr>
        @endforeach



    </tbody>
</table>

@endsection