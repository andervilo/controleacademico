<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TesteApiTest extends TestCase
{
    use MakeTesteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTeste()
    {
        $teste = $this->fakeTesteData();
        $this->json('POST', '/api/v1/testes', $teste);

        $this->assertApiResponse($teste);
    }

    /**
     * @test
     */
    public function testReadTeste()
    {
        $teste = $this->makeTeste();
        $this->json('GET', '/api/v1/testes/'.$teste->id);

        $this->assertApiResponse($teste->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTeste()
    {
        $teste = $this->makeTeste();
        $editedTeste = $this->fakeTesteData();

        $this->json('PUT', '/api/v1/testes/'.$teste->id, $editedTeste);

        $this->assertApiResponse($editedTeste);
    }

    /**
     * @test
     */
    public function testDeleteTeste()
    {
        $teste = $this->makeTeste();
        $this->json('DELETE', '/api/v1/testes/'.$teste->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/testes/'.$teste->id);

        $this->assertResponseStatus(404);
    }
}
