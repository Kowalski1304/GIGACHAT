<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class RegisterTest extends TestCase
{
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
            'password' => 'Password!9',
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
            'password' => 'Pass',
        ]);

        $response->assertSessionHasErrors('password',
            'The password field must be at least 8 characters.');
    }
}
