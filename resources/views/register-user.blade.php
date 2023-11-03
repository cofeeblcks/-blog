@extends('layout.master')

@section('content')
    <div class="container list-post" style="height: calc(100vh - 50px);">
        <div class="mt-5 mb-5 d-flex justify-content-between align-items-center">
            <h1>Form register user</h1>
        </div>
        <livewire:register-user/>
    </div>
@endsection