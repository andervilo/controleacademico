<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoordenadoresApiTest extends TestCase
{
    use MakeCoordenadoresTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCoordenadores()
    {
        $coordenadores = $this->fakeCoordenadoresData();
        $this->json('POST', '/api/v1/coordenadores', $coordenadores);

        $this->assertApiResponse($coordenadores);
    }

    /**
     * @test
     */
    public function testReadCoordenadores()
    {
        $coordenadores = $this->makeCoordenadores();
        $this->json('GET', '/api/v1/coordenadores/'.$coordenadores->id);

        $this->assertApiResponse($coordenadores->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCoordenadores()
    {
        $coordenadores = $this->makeCoordenadores();
        $editedCoordenadores = $this->fakeCoordenadoresData();

        $this->json('PUT', '/api/v1/coordenadores/'.$coordenadores->id, $editedCoordenadores);

        $this->assertApiResponse($editedCoordenadores);
    }

    /**
     * @test
     */
    public function testDeleteCoordenadores()
    {
        $coordenadores = $this->makeCoordenadores();
        $this->json('DELETE', '/api/v1/coordenadores/'.$coordenadores->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/coordenadores/'.$coordenadores->id);

        $this->assertResponseStatus(404);
    }
}
