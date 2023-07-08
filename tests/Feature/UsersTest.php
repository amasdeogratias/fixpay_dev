<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_created_successfully(): void
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Emanuely',
            'email' => 'johnema@gmail.com',
            'password' => bcrypt('Admin@123'),
            'address' => 'Mwisi',
            'city' => 'Singida',
            'country' => 'Tanzania',
        ]);
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
