<?php

namespace Tests\Feature\User;

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_user_profile()
    {
        $user = User::factory()->create();
        $newData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'city' => 'New York',
            'age' => 30,
        ];

        $this->actingAs($user)->patch('/profile', $newData);

        $this->assertDatabaseHas('users', $newData);
    }

    /** @test */
    public function it_can_delete_user_profile()
    {
        $user = User::factory()->create();
        $request = Request::create('/profile', 'DELETE');
        $request->setUserResolver(function () use ($user) {
            return $user;
        });
        Auth::shouldReceive('logout')->once();
        Redirect::shouldReceive('to')->once()->with('/')->andReturn(new RedirectResponse('/'));

        $controller = new ProfileController();
        $response = $controller->destroy($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
