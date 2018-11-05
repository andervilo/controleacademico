<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodosApiTest extends TestCase
{
    use MakePeriodosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePeriodos()
    {
        $periodos = $this->fakePeriodosData();
        $this->json('POST', '/api/v1/periodos', $periodos);

        $this->assertApiResponse($periodos);
    }

    /**
     * @test
     */
    public function testReadPeriodos()
    {
        $periodos = $this->makePeriodos();
        $this->json('GET', '/api/v1/periodos/'.$periodos->id);

        $this->assertApiResponse($periodos->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePeriodos()
    {
        $periodos = $this->makePeriodos();
        $editedPeriodos = $this->fakePeriodosData();

        $this->json('PUT', '/api/v1/periodos/'.$periodos->id, $editedPeriodos);

        $this->assertApiResponse($editedPeriodos);
    }

    /**
     * @test
     */
    public function testDeletePeriodos()
    {
        $periodos = $this->makePeriodos();
        $this->json('DELETE', '/api/v1/periodos/'.$periodos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/periodos/'.$periodos->id);

        $this->assertResponseStatus(404);
    }
}
