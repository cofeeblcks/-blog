<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostsModel;
use Carbon\Carbon;

class PostsLists extends Component
{
    public $allPosts;
    public $search;
    public $searchDate;

    public function createPost(){}

    public function mount()
    {
        $this->searchDate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $this->allPosts = PostsModel::getAllPosts($this->search, $this->searchDate);
        // dd($this->allPosts);
        return view('livewire.posts-lists', [
            'posts' => $this->allPosts
        ]);
    }

    public function update()
    {
        $this->allPosts = PostsModel::getAllPosts($this->search, $this->searchDate);
        dd($this->allPosts);
        return view('livewire.posts-lists', [
            'posts' => $this->allPosts
        ]);
    }
}
