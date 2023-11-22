<?php 

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinancialTest extends TestCase
{
    /**
     * Testa o método index do FinancialController.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/financial');
        $response->assertStatus(200);
        $response->assertViewIs('financial.index');
    }

    /**
     * Testa o método payable do FinancialController.
     *
     * @return void
     */
    public function testPayable()
    {
        $response = $this->get('/financial/payable');
        $response->assertStatus(200);
        $response->assertViewIs('financial.payable');
    }

    /**
     * Testa o método receivable do FinancialController.
     *
     * @return void
     */
    public function testReceivable()
    {
        $response = $this->get('/financial/receivable');
        $response->assertStatus(200);
        $response->assertViewIs('financial.receivable');
    }
}
