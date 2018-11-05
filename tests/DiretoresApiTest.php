<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DiretoresApiTest extends TestCase
{
    use MakeDiretoresTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDiretores()
    {
        $diretores = $this->fakeDiretoresData();
        $this->json('POST', '/api/v1/diretores', $diretores);

        $this->assertApiResponse($diretores);
    }

    /**
     * @test
     */
    public function testReadDiretores()
    {
        $diretores = $this->makeDiretores();
        $this->json('GET', '/api/v1/diretores/'.$diretores->id);

        $this->assertApiResponse($diretores->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDiretores()
    {
        $diretores = $this->makeDiretores();
        $editedDiretores = $this->fakeDiretoresData();

        $this->json('PUT', '/api/v1/diretores/'.$diretores->id, $editedDiretores);

        $this->assertApiResponse($editedDiretores);
    }

    /**
     * @test
     */
    public function testDeleteDiretores()
    {
        $diretores = $this->makeDiretores();
        $this->json('DELETE', '/api/v1/diretores/'.$diretores->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/diretores/'.$diretores->id);

        $this->assertResponseStatus(404);
    }
}
