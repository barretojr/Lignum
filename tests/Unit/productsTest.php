<?php 

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * Testa o método store do ProductsController.
     *
     * @return void
     */
    public function testStore()
    {
        $response = $this->get('/products/store');
        $response->assertStatus(200);
    }

    /**
     * Testa o método list do ProductsController.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get('/products/list');
        $response->assertStatus(200);
    }

    /**
     * Testa o método show do ProductsController.
     *
     * @return void
     */
    public function testShow()
    {
        $productId = 1; // Substitua pelo ID real do produto a ser testado
        $response = $this->get("/products/{$productId}");
        $response->assertStatus(200);
    }

    /**
     * Testa o método update do ProductsController.
     *
     * @return void
     */
    public function testUpdate()
    {
        $productId = 1;
        $response = $this->post("");
    }
}
