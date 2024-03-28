<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;


    public function testUserCanRegister()
    {
        $userData = [
            'name' => 'bouananisfn@gmail.com',
            'email' => 'bouananisfn@gmail.com',
            'password' => '123',
            'c_password' => '123',
        ];

        $response = $this->post('/api/v1/register', $userData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
    }

    public function testUserCanLogin()
    {
        $user = \App\Models\User::factory()->create();

        $userData['email'] = $user->email;
        $userData['password'] = 'password';

        $response = $this->post('/api/v1/login', $userData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => $user->id,
        ]);
    }


}
