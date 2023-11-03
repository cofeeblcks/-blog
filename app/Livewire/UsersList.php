<?php

namespace App\Livewire;

use App\Models\UsersModel;
use Carbon\Carbon;
use Livewire\Component;

class UsersList extends Component
{
    public $allUsers;
    public $search;

    public function render()
    {
        $this->allUsers = UsersModel::getAllUsers($this->search);
        return view('livewire.users-list',[
            'users' => $this->allUsers
        ]);
    }

}
