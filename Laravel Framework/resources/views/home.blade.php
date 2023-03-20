@extends('layouts.app')

@section('content')

<div class=" d-flex flex-column justify-content-center align-items-center gap-2" style="height:90vh;">
    <div class="card col-8 bg-light d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex justify-content-center align-items-center">
            <img
                src="
                https://2.bp.blogspot.com/-P8hDVulVP1I/Xl-mVLf21PI/AAAAAAAz7rI/QERvdKvZC5oBadQxRrmwu1WMD5DhSoXvgCLcBGAsYHQ/s1600/AW4185507_00.gif ">
        </div>
        <div class=" d-flex justify-content-center align-items-center">
            @if (session('status'))
            <div class=" alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class=" alert alert-success" role="alert">{{ __('You are logged in Successfully!') }}</div>
        </div>
    </div>
</div>
@endsection