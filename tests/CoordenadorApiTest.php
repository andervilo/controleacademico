<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoordenadorApiTest extends TestCase
{
    use MakeCoordenadorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCoordenador()
    {
        $coordenador = $this->fakeCoordenadorData();
        $this->json('POST', '/api/v1/coordenadors', $coordenador);

        $this->assertApiResponse($coordenador);
    }

    /**
     * @test
     */
    public function testReadCoordenador()
    {
        $coordenador = $this->makeCoordenador();
        $this->json('GET', '/api/v1/coordenadors/'.$coordenador->id);

        $this->assertApiResponse($coordenador->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCoordenador()
    {
        $coordenador = $this->makeCoordenador();
        $editedCoordenador = $this->fakeCoordenadorData();

        $this->json('PUT', '/api/v1/coordenadors/'.$coordenador->id, $editedCoordenador);

        $this->assertApiResponse($editedCoordenador);
    }

    /**
     * @test
     */
    public function testDeleteCoordenador()
    {
        $coordenador = $this->makeCoordenador();
        $this->json('DELETE', '/api/v1/coordenadors/'.$coordenador->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/coordenadors/'.$coordenador->id);

        $this->assertResponseStatus(404);
    }
}
