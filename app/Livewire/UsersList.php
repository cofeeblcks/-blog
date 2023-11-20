<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersList extends Component
{
    public $allUsers;
    public $search;

    public function mount()
    {
        if ( Auth::check() ) {
            return view('livewire.users-list',[
                'users' => $this->allUsers
            ]);
        }else{
            return route('home');
        }
    }

    public function render()
    {
        $this->allUsers = User::getAllUsers($this->search);
        return view('livewire.users-list',[
            'users' => $this->allUsers
        ]);
    }

    public function changeState($id, $state){
        try {
            $updated = User::changeState($id, $state);
        } catch (\Throwable $e) {
            $updated = false;
        }
        
        return $updated;
    }

}
