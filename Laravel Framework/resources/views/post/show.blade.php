@extends('layouts.app')

@section('title') Show Post @endsection

@section('content')
<div class="card my-5">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Title: {{$post->title}}</h5>
        <p class="card-text fs-6"><b>Description: </b> {{$post->description}}</p>
    </div>
</div>

<div class="card mt-6">
    <div class="card-header">
        Post Creator Info
    </div>
    <div class="card-body">
        <p class="card-text fs-6"><b>Name: </b> {{$post->user->name}}</p>
        <p class="card-text fs-6"><b>Email: </b> {{$post->user->email}}</p>
        <p class="card-text fs-6"><b>Created At: </b> {{$post->created_at->format('l jS F Y h:i:s A')}}</p>
        @if($post->updated_at)
        <p class="card-text fs-6"><b>Updated At: </b> {{$post->updated_at->format('l jS F Y h:i:s A')}}</p>
        @endif
    </div>
</div>

@endsection