<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;

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
        'firstName' => ['required'],
        'lastName' => ['required'],
        'email' => ['required', 'email'],
        'birthDate' => ['required'],
        'password' => ['required']
    ];


    public function render()
    {
        return view('livewire.register-user');
    }

    public function register()
    {

        $this->validate();

        // Validamos que la edad del usuario sea mas de 18
        $dateOfBirth = Carbon::createFromFormat('Y-m-d', $this->birthDate);
        $currentDate = Carbon::now();
        $age = $dateOfBirth->diffInYears($currentDate);
        if ($age < 18) {
            session()->flash('warning', 'You are ' . $age . ' years old. Can\'t register, only adults.');
        } else {
            // Validamos que el documento del usuario, no exista en la bbdd, ya que es un campo unico
            $reservation = DB::table('users')
                ->where('document', '=', $this->document)
                ->count();
            if ($reservation == 0) {
                // Confirmamos el correo electronico del usuario, ya que es campo unico, y se usa para loguearse en la bbdd
                $reservation = DB::table('users')
                ->where('email', '=', $this->email)
                ->count();
                if ($reservation == 0) {
                    try {
                        UsersModel::create([
                            'document' => $this->document,
                            'first_name' => $this->firstName,
                            'last_name' => $this->lastName,
                            'email' => $this->email,
                            'birthdate' => $this->birthDate,
                            'password' => Hash::make($this->password)
                        ]);

                        session()->flash('message', 'The user has register succesfully');

                        $this->reset();
                    } catch (\Exception $e) {
                        session()->flash('warning', 'Exception. Verify your SQL: ' . $e);
                    }
                } else {
                    session()->flash('warning', 'Already exists user with email ' . $this->email);
                }
            } else {
                session()->flash('warning', 'The user with document ' . $this->document . ' already exists.');
            }
        }
    }
}
