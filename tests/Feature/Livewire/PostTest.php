<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreatePost;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function renders_create_post_component()
    {
        Livewire::test(CreatePost::class)
            ->assertStatus(200);
    }

    /** @test */
    public function render_view_posts(): void
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }

    /** @test */
    function create_a_post()
    {
        Auth::attempt(['email' => 'chavezhadik@gmail.com', 'password' => '123456', 'state' => 1]);

        Livewire::test(CreatePost::class)
            ->set('title', 'this title post')
            ->set('description', 'This description post')
            ->call('register');
        $this->assertTrue(Posts::whereTitle('this title post')->exists());
    }
}
