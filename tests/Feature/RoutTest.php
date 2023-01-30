<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     // Тестирование корневой страницы
     public function test_RootRoutes()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    // Тестирование корневой страницы
    public function test_NewsRoutes()
    {
    $response = $this->get('/news');
     
    $response->assertStatus(200);
    }
    // Тестирование сохранения формы в файл
    public function test_AddLike()
    {
        $like_text = "this test like text";     

        $response = $this->post('/like/like-text',['like' => $like_text]);
 
        $response
            ->assertStatus(200)
            ->assertJson([
                'like' => true,
            ]);
    }
}
