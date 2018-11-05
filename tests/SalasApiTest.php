<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SalasApiTest extends TestCase
{
    use MakeSalasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSalas()
    {
        $salas = $this->fakeSalasData();
        $this->json('POST', '/api/v1/salas', $salas);

        $this->assertApiResponse($salas);
    }

    /**
     * @test
     */
    public function testReadSalas()
    {
        $salas = $this->makeSalas();
        $this->json('GET', '/api/v1/salas/'.$salas->id);

        $this->assertApiResponse($salas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSalas()
    {
        $salas = $this->makeSalas();
        $editedSalas = $this->fakeSalasData();

        $this->json('PUT', '/api/v1/salas/'.$salas->id, $editedSalas);

        $this->assertApiResponse($editedSalas);
    }

    /**
     * @test
     */
    public function testDeleteSalas()
    {
        $salas = $this->makeSalas();
        $this->json('DELETE', '/api/v1/salas/'.$salas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/salas/'.$salas->id);

        $this->assertResponseStatus(404);
    }
}
