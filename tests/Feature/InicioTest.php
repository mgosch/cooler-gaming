<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InicioTest extends TestCase
{
    /** @test */
    public function it_visit_page_of_inicio()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee("Cooler Gaming");
    }

    /** @test */
    public function it_visit_page_of_info_legal()
    {
        $response = $this->get('/legal');

        $response->assertStatus(200);
        $response->assertSee("Derechos de autor");
    }

    /** @test */
    public function it_visit_page_of_politica_privacidad()
    {
        $response = $this->get('/privacy');

        $response->assertStatus(200);
        $response->assertSee("Política de privacidad");
    }

    /** @test */
    public function it_visit_page_of_acuerdo_suscriptor()
    {
        $response = $this->get('/acuerdo');

        $response->assertStatus(200);
        $response->assertSee("ACUERDO DE SUSCRIPTOR A Cooler Gaming");
    }

    /** @test */
    public function it_visit_page_of_reembolso()
    {
        $response = $this->get('/reembolso');

        $response->assertStatus(200);
        $response->assertSee("Reembolsos en Cooler Gaming");
    }
    
    /** @test */
    public function it_visit_page_of_nosotros()
    {
        $response = $this->get('/acerca');

        $response->assertStatus(200);
        $response->assertSee("Accede a los juegos al instante");
    }
}
