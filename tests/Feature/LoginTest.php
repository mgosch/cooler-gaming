<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function it_visit_page_of_login()
    {
        $this->get('/login')
            ->assertSee('Ingresar');
    }

    /** @test */
    public function authenticated_to_a_user()
    {
        $user = User::create([
            'name' => 'Prueba',
            'email' => 'user@mail.com',
            'password' => Hash::make('secret'),
            'type' => 'client',
        ]);
        $this->get('/login')->assertSee('Ingresar');
        $credentials = [
            "email" => "user@mail.com",
            "password" => "secret"
        ];
        $response = $this->post('/login', $credentials);
        $response->assertRedirect('/home');
        $this->assertCredentials($credentials);
    }


      /** @test */
      public function not_authenticate_to_a_user_with_credentials_invalid()
      {
        $user = User::create([
            'name' => 'Prueba',
            'email' => 'user@mail.com',
            'password' => Hash::make('secret'),
            'type' => 'client',
        ]);
  
          $credentials = [
              "email" => "users@mail.com",
              "password" => "secret2"
          ];
  
          $this->assertInvalidCredentials($credentials);
      }

      /** @test */
      public function the_email_is_required_for_authenticate()
      {
        $user = User::create([
            'name' => 'Prueba',
            'email' => 'user@mail.com',
            'password' => Hash::make('secret'),
            'type' => 'client',
        ]);
  
          $credentials = [
              "email" => null,
              "password" => "secret"
          ];
  
          $response = $this->from('/login')->post('/login', $credentials);
  
          $response->assertRedirect('/login')
              ->assertSessionHasErrors([
                  'email' => 'The email field is required.',
              ]);
      }
  
      /** @test */
      public function the_password_is_required_for_authenticate()
      {
        $user = User::create([
            'name' => 'Prueba',
            'email' => 'user@mail.com',
            'password' => Hash::make('secret'),
            'type' => 'client',
        ]);
  
          $credentials = [
              "email" => "user@mail.com",
              "password" => null
          ];
  
          $response = $this->from('/login')->post('/login', $credentials);
  
          $response->assertRedirect('/login')
              ->assertSessionHasErrors([
                  'password' => 'The password field is required.',
              ]);
      }
  
      /** @test */
      public function a_user_can_logout()
      {
            $user = User::create([
                'name' => 'Prueba',
                'email' => 'user@mail.com',
                'password' => Hash::make('secret'),
                'type' => 'client',
            ]);
            $credentials = [
                "email" => "user@mail.com",
                "password" => null
            ];

            $this->from('/login')->post('/login', $credentials);
            $response = $this->post('/logout');
            $response->assertRedirect('/');
            $this->assertGuest();
      }
  
      /** @test */
      public function as_user_cannot_logout_when_not_authenticated()
      {
          $response = $this->post('/logout');
          $response->assertRedirect('/');
          $this->assertGuest();
      }

  }

