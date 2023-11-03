<?php

namespace App\Livewire;

use App\Models\UsersModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterUser extends Component
{
    public $document;
    public $firstName;
    public $lastName;
    public $email;
    public $birthDate;
    public $password;

    protected $rules = [
        'document' => ['required'],
        'fisrtName' => ['required'],
        'lastName' => ['required'],
        'email' => ['required', 'email'],
        'birthDate' => ['required'],
        'password' => ['required']
    ];


    public function render()
    {
        return view('livewire.register-user');
    }

    public function register(){

        $this->validate();
        
        // Validamos que la edad del usuario sea mas de 18
        $dateOfBirth = Carbon::createFromFormat('Y-m-d', $this->birthDate);
        $currentDate = Carbon::now();
        $age = $dateOfBirth->diffInYears($currentDate);
        if( $age < 18 ){
            session()->flash('message', 'You are ' . $age . ' years old. Can\'t register, only adults.');
        }

        UsersModel::create([
            'document' => $this->document,
            'fisrt_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'birthdate' => $this->birthDate,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('message', 'The user has register succesfully');

        $this->reset();
    }
}
