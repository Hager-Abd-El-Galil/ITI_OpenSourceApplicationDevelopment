@extends('layouts.app')

@section('title') Home @endsection

@section('content')
<div class="text-center">
    <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Title</th>
            <th scope="col" class="text-center">Posted By</th>
            <th scope="col" class="text-center">Created At</th>
            <th scope="col" class="text-center">Updated At</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($posts as $post)
        <tr>
            <td class="text-center">{{$post->id}}</td>
            <td class="text-center">{{$post->title}}</td>
            @if($post->user)
            <td class="text-center">{{$post->user->name}}</td>
            @else
            <td class="text-center">Unknown</td>
            @endif

            <td class="text-center">{{$post->created_at->format('Y-m-d')}}</td>
            @if($post->updated_at)
            <td class="text-center">{{$post->updated_at->format('Y-m-d')}}</td>
            @else
            <td class="text-center">-</td>
            @endif
            <td class="text-center">
                <x-button href="{{route('posts.show', $post->id)}}" type="info" label="View" />
                <x-button href="{{route('posts.edit', $post->id)}}" type="primary" label="Edit" />
                <button class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirm-delete-modal{{$post->id}}">Delete</button>
            </td>
        </tr>
        <!--Delete Modal-->
        <div class="modal fade" id="confirm-delete-modal{{$post->id}}" tabindex="-1" role="dialog"
            aria-labelledby="confirm-delete-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirm-delete-modal-label">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this item?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancel-delete-button"
                            data-dismiss="modal">Cancel</button>
                        <form style="display: inline" method="POST"
                            action="{{ route('posts.delete', ['post' => $post->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type=" button" class="btn btn-danger" id="confirm-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
<div class="row col-12 text-center d-flex flex-row justify-content-center my-4">
    <div class="row w-auto">
        {{ $posts->links('pagination::bootstrap-4')}}</div>
</div>
<script src=" https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script>
$(function() {
    $('#confirm-delete-button').click(function() {
        $('#confirm-delete-modal').modal('hide');
    });
    $('#cancel-delete-button').click(function() {
        $('#confirm-delete-modal').modal('hide');
    });
});
</script>

@endsection