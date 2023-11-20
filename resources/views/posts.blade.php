@extends('layout.master')

@section('content')
    <div class="container list-post">
        <div class="mt-5 mb-5 d-flex justify-content-between align-items-center">
            <h1>List post created</h1>
            @if ( session('status'))
                <a class="btn btn-dark" href="{{ route('create-post') }}">New post</a>
            @endif
        </div>
        <livewire:posts-lists/>
    </div>
@endsection