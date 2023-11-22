<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Testa o método index do HomeController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Chama a rota e verifica se a resposta tem o status 200 (OK)
        $response = $this->get('/');
        $response->assertStatus(200);

        // Verifica se a view 'home.index' é retornada
        $response->assertViewIs('home.index');
    }
}
