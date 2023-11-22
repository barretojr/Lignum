<?php 

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    /**
     * Testa o método store do ClientsController.
     *
     * @return void
     */
    public function testStore()
    {
        $response = $this->get('/clients/store');
        $response->assertStatus(200);
    }

    /**
     * Testa o método list do ClientsController.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get('/clients/list');
        $response->assertStatus(200);
    }

    /**
     * Testa o método search do ClientsController.
     *
     * @return void
     */
    public function testSearch()
    {
        
        $response = $this->post('/clients/search', ['search_client' => 'example']);
        $response->assertStatus(200);
    }

    /**
     * Testa o método show do ClientsController.
     *
     * @return void
     */
    public function testShow()
    {
        $clientId = 1; // Substitua pelo ID real do cliente a ser testado
        $response = $this->get("/clients/{$clientId}");
        $response->assertStatus(200);
        // Adicione asserções relevantes para garantir o comportamento esperado.
    }

    /**
     * Testa o método historic do ClientsController.
     *
     * @return void
     */
    public function testHistoric()
    {
        $clientId = 1;
        $response = $this->get("/clients/historic/{$clientId}");
        $response->assertStatus(200);
    }

    /**
     * Testa o método insert do ClientsController.
     *
     * @return void
     */
    public function testInsert()
    {
        
        $response = $this->post('/clients/insert', ['name' => 'John Doe','email'=> 'test@jondoe.com']);
        $response->assertStatus(200);
    }

    /**
     * Testa o método update do ClientsController.
     *
     * @return void
     */
    public function testUpdate()
    {
        $clientId = 1; 
        $response = $this->post("/clients/update/{$clientId}", ['name' => 'test name', ]);
        $response->assertStatus(200);
    }
}
