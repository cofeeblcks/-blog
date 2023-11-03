<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();
        if ( Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->flash('message', 'Login successfully.');
            return redirect()->intended('/users');
        } else {
            session()->flash('error', 'Email or password is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
