<?php

namespace Tests\Feature;

use App\Livewire\Login;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

class LoginTest extends TestCase
{
    /** @test */
    public function renders_login_component()
    {
        Livewire::test(Login::class)
            ->assertStatus(200);
    }

    /** @test */
    public function restrict_view(): void
    {
        $this->get('/users')->assertRedirect('/login');
    }

    /** @test */
    public function login_authenticate()
    {
        $response = Auth::attempt(['email' => 'chavezhadik@gmail.com', 'password' => '123456', 'state' => 1]);
        $this->assertTrue($response);
    }
}
