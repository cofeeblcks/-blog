<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $isLogin = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'state' => 1])) {
            session()->flash('message', 'Login successfully.');
            session(['status' => true]);
            if( Auth::user()->id_role == 1 )
                return redirect('/users');
            return redirect('/posts');
        } else {
            session()->flash('error', 'Email or password is incorrect. Or the user is inactive');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        $this->isLogin = !$this->isLogin;
    }

    public function render()
    {
        return view('livewire.login');
    }
}
