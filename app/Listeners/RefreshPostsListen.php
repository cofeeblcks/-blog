<?php

namespace App\Listeners;

use App\Events\RefreshPosts;
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
    public function handle(RefreshPosts $event): void
    {
        // dd($event);
        Livewire::emit('refreshPosts');
    }
}
