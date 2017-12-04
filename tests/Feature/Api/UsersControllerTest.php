<?php

namespace Tests\Feature\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_will_register_a_user()
    {
        $response = $this->post('api/register', [
            'name' => 'Foo',
            'address' => 'Hurstville',
            'password' => 'secret',
            'email' => 'foo@bar.com',
        ]);

        $response->assertJson([
            'data' => [
                'name' => 'Foo',
                'email' => 'foo@bar.com'
            ]
        ]);
    }

    /** @test */
    public function it_will_return_user_info()
    {
        $user = factory(User::class)->create();

        $response = $this->get("/api/users/{$user->id}");

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }

    /** @test */
    public function it_will_update_user_info()
    {
        $user = factory(User::class)->create();

        $response = $this->put("/api/users/{$user->id}", [
            'name' => 'test',
            'address' => 'Sydney',
            'email' => $user->email
        ]);

        $response->assertJson([
            'data' => [
                'name' => 'test',
                'email' => $user->email,
                'address' => 'Sydney'
            ]
        ]);
    }
}
