<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmedYourEmail;
use Tests\TestCase;
use App\User;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function it_visit_page_of_register()
    {
        $this->get('/register')
            ->assertSee('Registrarse');
    }

    /** @test */
    public function cannot_view_registration_form_when_authenticated()
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
        $this->post('/login', $credentials);
        $response = $this->get('/register');
        $response->assertRedirect('/home');
    }


    /** @test */
    public function user_can_registered_in_the_site_web()
    {
        $response = $this->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => 'user@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/home');

        $this->assertCredentials([
            'name'                   => 'Prueba',
            'email'                  => 'user@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);
    }

    /** @test */
    public function the_name_is_required()
    {
        $response = $this->from('/register')->post('/register', [
            'name'                  => null,
            'email'                  => 'user@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
                    ->assertSessionHasErrors([
                        'name' => 'The name field is required.',
                    ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'user@mail.com'
        ]);
    }

    /** @test */
    public function the_name_not_is_string()
    {
        $response = $this->from('/register')->post('/register', [
            'name'                  => 123443,
            'email'                  => 'user@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                'name' => 'The name must be a string.',
            ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'user@mail.com'
        ]);
    }

    /** @test */
    public function the_name_has_more_of_255_characters()
    {
        $response = $this->from('/register')->post('/register', [
            'name'                  => "Lorem ipsum dolor sit amet consectetur adipiscing elit sapien, aenean suspendisse mattis volutpat sollicitudin condimentum hendrerit praesent, montes nec tempor habitant blandit id class. Sem mollis semper fames risus torquent maecenas, in bibendum litora justo pellentesque porta, vel montes molestie nascetur ligula.",
            'email'                  => 'user@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                'name' => 'The name may not be greater than 255 characters.',
            ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'user@mail.com'
        ]);
    }

    /** @test */
    public function the_email_is_required()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  =>  null,
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors(["email" => "The email field is required."]);

        $this->assertDatabaseMissing('users', [
            'email' => 'user@mail.com'

        ]);
    }

    /** @test */
    public function the_email_not_is_string()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  =>  0000000000000000,
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "email" => "The email must be a string."
            ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'user@mail.com'
        ]);
    }

    /** @test */
    public function the_email_has_format_email()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => 'email@@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "email" => "The email must be a valid email address."
            ]);

        $this->assertDatabaseMissing('users', [
          'email'     => 'user@mail.com'

        ]);
    }

    /** @test */
    public function the_email_is_unique()
    {
        $this->withExceptionHandling();

        $user = User::create([
            'name' => 'Prueba',
            'email' => 'user@mail.com',
            'password' => Hash::make('banana01'),
            'type' => 'client',
        ]);

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => $user->email,
            'password'               => 'banana01',
            'password_confirmation'  => 'banana01',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "email" => "El campo email ya ha sido registrado."
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $user->email
        ]);
    }

    /** @test */
    public function the_password_is_required()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => 'user@mail.com',
            'password'               =>  null,
            'password_confirmation'  =>  null,
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "password" => "The password field is required."
            ]);

        $this->assertDatabaseMissing('users', [
           "email" => "user@mail.com"
        ]);
    }

    /** @test */
    public function the_password_is_string()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => 'user@mail.com',
            'password'               =>  12345678,
            'password_confirmation'  =>  null,
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "password" => "The password must be a string."
            ]);

        $this->assertDatabaseMissing('users', [
            "email" => "user@mail.com"
        ]);
    }

    /** @test */
    public function the_password_has_how_minimum_eight_characters()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => 'user@mail.com',
            'password'               =>  'pepe',
            'password_confirmation'  =>  'pepe',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "password" => "La contraseña debe tener al menos 8 caracteres."
            ]);

        $this->assertDatabaseMissing('users', [
            "email" => "user@mail.com"
        ]);
    }

    /** @test */
    public function the_password_is_confirmed()
    {
        $this->withExceptionHandling();

        $response = $this->from('/register')->post('/register', [
            'name'                   => 'Prueba',
            'email'                  => 'user@mail.com',
            'password'               => 'banana01',
            'password_confirmation'  => 'pepe000001',
            'type'                   => 'client'
        ]);

        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                "password" => "La confirmación de la contraseña no coincide."
            ]);

        $this->assertDatabaseMissing('users', [
            "email" => "user@mail.com"
        ]);
    }
}