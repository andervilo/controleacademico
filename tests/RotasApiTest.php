<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RotasApiTest extends TestCase
{
    use MakeRotasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRotas()
    {
        $rotas = $this->fakeRotasData();
        $this->json('POST', '/api/v1/rotas', $rotas);

        $this->assertApiResponse($rotas);
    }

    /**
     * @test
     */
    public function testReadRotas()
    {
        $rotas = $this->makeRotas();
        $this->json('GET', '/api/v1/rotas/'.$rotas->id);

        $this->assertApiResponse($rotas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRotas()
    {
        $rotas = $this->makeRotas();
        $editedRotas = $this->fakeRotasData();

        $this->json('PUT', '/api/v1/rotas/'.$rotas->id, $editedRotas);

        $this->assertApiResponse($editedRotas);
    }

    /**
     * @test
     */
    public function testDeleteRotas()
    {
        $rotas = $this->makeRotas();
        $this->json('DELETE', '/api/v1/rotas/'.$rotas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rotas/'.$rotas->id);

        $this->assertResponseStatus(404);
    }
}
