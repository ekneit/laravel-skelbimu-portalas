<?php

namespace Tests\Feature\Http\Controllers\Authentication;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user(): void
    {
        $response = $this->post(
            route('authentication.registration'),
            [
                'email' => 'someEmail@gmail.com',
                'first_name' => 'test',
                'last_name' => 'test',
                'phone' => '123456',
                'city' => 'City',
                'is_admin' => 1,
                'password' => '123456',
                'password_confirmation' => '123456',
            ]
        );
        $this->assertDatabaseHas('users', ['first_name' => 'test']);
        $this->assertAuthenticated();

        $response->assertRedirect(route('dashboard'));
    }
}
