<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_redirect_to_admin_dashboard(): void
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin@123')
        ]);
        $response = $this->post(route('admin.login.post'), [
            'email' => 'admin@gmail.com',
            'password' => 'Admin@123'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin');
    }
}
