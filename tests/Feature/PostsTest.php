<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function render_blog_posts(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    function create_a_post()
    {
        // $this->actingAs(User::factory()->create());

        // Livewire::test(CreatePost::class)
        //     ->set('title', 'foo')
        //     ->call('register');
        // $this->assertTrue(Post::whereTitle('foo')->exists());
    }
}
