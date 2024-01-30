<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function registration_test()
    {
        $response = $this->post('/register', [
            'name' => 'Alex',
            'city' => 'Kiev',
            'age' => '18',
            'email' => 'alex.18@cofg.com',
            'password' => 'Password!9',
            'password_confirmation' => 'Password!9',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function password_error_test()
    {
        $response = $this->post('/register', [
            'name' => 'Alex',
            'city' => 'Kiev',
            'age' => '18',
            'email' => 'alex.18@cofg.com',
            'password' => 'Pass',
            'password_confirmation' => 'Pass',

        ]);

        $response->assertSessionHasErrors('password',
            'The password field must be at least 8 characters.');
    }
}
