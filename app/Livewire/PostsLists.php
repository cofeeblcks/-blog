<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Posts;
use Carbon\Carbon;
use Livewire\Attributes\On;

class PostsLists extends Component
{
    public $posts;
    public $search = '';
    public $searchDate = '';

    #[On('post-created')] 
    public function refreshPosts()
    {
        $this->posts = Posts::all();
    }

    public function mount()
    {
        $this->searchDate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $this->posts = Posts::getAllPosts($this->search, $this->searchDate);
        return view('livewire.posts-lists', [
            'posts' => $this->posts
        ]);
    }
}
