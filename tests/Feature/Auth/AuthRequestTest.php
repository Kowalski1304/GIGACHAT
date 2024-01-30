<?php

namespace Auth;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AuthRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function authentication_test()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function test_password_error_character()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
                'email' => $user->email,
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
            'email' => 'alex.18@cofg.com',
            'password' => 'Password1!',
        ]);

        $response->assertSessionHasErrors('email',
            'Такого ніка не існує y мене в бд');
    }

    public function test_logout()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->post('/logout');
        $response->assertRedirect('/');
    }
}
