<?php

namespace App\Listeners;

use App\Events\RefreshPosts;
use App\Models\Posts;
use Livewire\Livewire;

class RefreshPostsListen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RefreshPosts $event)
    {
        event('refreshPosts');
        // Livewire::component('posts-lists', ['posts' => Posts::all()])->refreshPosts();
        // Livewire::emit('refreshPosts');
        // Livewire::refresh();
        // Livewire::dispatch('refreshPosts');
    }
}
