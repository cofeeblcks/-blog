<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Posts;
use Carbon\Carbon;

class PostsLists extends Component
{
    public $allPosts;
    public $search;
    public $searchDate;

    public function mount()
    {
        $this->searchDate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $this->allPosts = Posts::getAllPosts($this->search, $this->searchDate);
        return view('livewire.posts-lists', [
            'posts' => $this->allPosts
        ]);
    }

    public function update()
    {
        $this->allPosts = Posts::getAllPosts($this->search, $this->searchDate);
        return view('livewire.posts-lists', [
            'posts' => $this->allPosts
        ]);
    }
}
