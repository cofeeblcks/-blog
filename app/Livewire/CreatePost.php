<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => ['required', 'min:10', 'max:100'],
        'description' => ['required', 'min:10']
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function register()
    {
        $this->validate();
        $idUser = Auth::user()->id;

        try {
            Posts::create([
                'id_user' => $idUser,
                'title' => $this->title,
                'description' => $this->description
            ]);

            session()->flash('message', 'The entry has register succesfully');

            $this->reset();
        } catch (\Exception $e) {
            session()->flash('warning', 'Exception. Verify your SQL: ' . $e);
        }
    }
}
