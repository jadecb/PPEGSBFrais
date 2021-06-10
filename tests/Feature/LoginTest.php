<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanAccessLoginPage()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testCanLogin()
    {

        $response = $this->from('/login')->post('/login',[
            'email'=>'a.white@gsb.com',
            'password'=>'123456+aze',
        ]);

        $response->assertRedirect('/');
    }

    public function testCanNotLogin()
    {

        $response = $this->from('/login')->post('/login',[
            'email'=>'a.black@gsb.com',
            'password'=>'789456+xyz',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }
}
