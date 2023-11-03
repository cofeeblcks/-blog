@extends('layout.master')

@section('content')
    <div class="container list-post">
        <div class="mt-5 mb-5 d-flex justify-content-between align-items-center">
            <h1>List post created</h1>
            <div class="btns-container">
                <button type="button" class="btn btn-block btn-blue">Crate entry</button>
            </div>
        </div>
        <livewire:posts-lists/>
    </div>
@endsection