<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    /**
     * Testa o método store do ItemsController.
     *
     * @return void
     */
    public function testStore()
    {
        $response = $this->get('/items/store');
        $response->assertStatus(200);
    }

    /**
     * Testa o método list do ItemsController.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get('/items/list');
        $response->assertStatus(200);
    }

    /**
     * Testa o método show do ItemsController.
     *
     * @return void
     */
    public function testShow()
    {
        $itemId = 1; 
        $response = $this->get("/items/{$itemId}");
        $response->assertStatus(200);
    }
}
