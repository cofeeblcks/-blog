<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostsModel;

class PostsLists extends Component
{
    public $allPosts;

    public function createPost(){}

    public function render()
    {
        $this->allPosts = PostsModel::getAllPosts();
        return view('livewire.posts-lists', [
            'posts' => $this->allPosts
        ]);
    }
}
