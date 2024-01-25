<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function authentication_test()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'name' => $user->name,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function password_error_test()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
                'name' => $user->name,
                'password' => 'pass',
        ]);

        $response->assertSessionHasErrors('password',
            'The password field must be at least 8 characters.');
    }

    /**
     * @test
     */
    public function test_no_user()
    {
        $response = $this->post('/login', [
            'name' => 'Alex Lox',
            'password' => 'Password1!',
        ]);

        $response->assertSessionHasErrors('name',
            'Такого ніка не існує y мене в бд');
    }
}
