<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Posts;
use Carbon\Carbon;

class PostsLists extends Component
{
    public $search = '';
    public $searchDate = '';

    public function mount()
    {
        $this->searchDate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $posts = Posts::getAllPosts($this->search, $this->searchDate);
        return view('livewire.posts-lists', [
            'posts' => $posts->get()
        ]);
    }

    public function updateListViewPosts()
    {
        $posts = Posts::getAllPosts('', Carbon::now()->format('Y-m-d'));
        return view('livewire.posts-lists', [
            'posts' => $posts->get()
        ]);
    }
}
