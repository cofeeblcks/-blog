<?php

namespace Tests\Feature\Livewire;

use App\Livewire\RegisterUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    /** @test */
    public function renders_register_user_component()
    {
        Livewire::test(RegisterUser::class)
            ->assertStatus(200);
    }

    /** @test */
    public function render_view_form_register_user(): void
    {
        $response = $this->get('/user/register');
        $response->assertStatus(200);
    }

    /** @test */
    function register_a_user()
    {
        Livewire::test(RegisterUser::class)
            ->set('document', '134679')
            ->set('first_name', 'Test')
            ->set('last_name', 'Blcks')
            ->set('email', 'test@cofeeblcks.com')
            ->set('birthdate', '1980-01-01')
            ->set('password', Hash::make('123456'))
            ->call('register');
        $this->assertTrue(User::whereId(2)->exists());
    }
}
