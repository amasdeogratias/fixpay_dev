<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
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

    
    public function test_admin_routes_protected_by_admin_middleware()
    {
        /** @var Router $router */
        $router = app('router');


        /** @var Collection|Route[] $routes */
        $unprotected_routes = collect($router->getRoutes())->filter(function (Route $route) {
            if (!preg_match('/^admin/', $route->getName())) {
                return false;
            }

            return !in_array('auth:admin', $route->gatherMiddleware());
        });

        $message = $unprotected_routes->map(function(Route $route){
            return sprintf('Route `%s` (%s) is missing `auth` middleware', $route->uri(), $route->getName());
        })->implode("\n");

        $this->assertCount(0, $unprotected_routes, $message);
    }
}
