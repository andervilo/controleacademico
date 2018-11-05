<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EscolasApiTest extends TestCase
{
    use MakeEscolasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEscolas()
    {
        $escolas = $this->fakeEscolasData();
        $this->json('POST', '/api/v1/escolas', $escolas);

        $this->assertApiResponse($escolas);
    }

    /**
     * @test
     */
    public function testReadEscolas()
    {
        $escolas = $this->makeEscolas();
        $this->json('GET', '/api/v1/escolas/'.$escolas->id);

        $this->assertApiResponse($escolas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEscolas()
    {
        $escolas = $this->makeEscolas();
        $editedEscolas = $this->fakeEscolasData();

        $this->json('PUT', '/api/v1/escolas/'.$escolas->id, $editedEscolas);

        $this->assertApiResponse($editedEscolas);
    }

    /**
     * @test
     */
    public function testDeleteEscolas()
    {
        $escolas = $this->makeEscolas();
        $this->json('DELETE', '/api/v1/escolas/'.$escolas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/escolas/'.$escolas->id);

        $this->assertResponseStatus(404);
    }
}
