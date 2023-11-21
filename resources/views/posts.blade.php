@extends('layout.master')

@section('content')
<div class="container list-post">
    <div class="mt-5 mb-5 d-flex justify-content-between align-items-center">
        <h1>List post created</h1>
        @if ( session('status'))
        <a class="btn btn-dark" href="{{ route('create-post') }}">New post</a>
        @endif
    </div>
    <livewire:posts-lists />
</div>
@endsection

@push('scripts')
<script>
    // Livewire.on('refreshPosts', () => {
    //     // Call a Livewire method to refresh the posts
    //     Livewire.emit('refresh');
    // });
    Echo.channel('posts')
        .listen('PostUpdated', (e) => {
            console.log('Post Updated', e);
            // Update your DOM here with the updated post data.
        });
</script>
@endpush