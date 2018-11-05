<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PessoasApiTest extends TestCase
{
    use MakePessoasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePessoas()
    {
        $pessoas = $this->fakePessoasData();
        $this->json('POST', '/api/v1/pessoas', $pessoas);

        $this->assertApiResponse($pessoas);
    }

    /**
     * @test
     */
    public function testReadPessoas()
    {
        $pessoas = $this->makePessoas();
        $this->json('GET', '/api/v1/pessoas/'.$pessoas->id);

        $this->assertApiResponse($pessoas->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePessoas()
    {
        $pessoas = $this->makePessoas();
        $editedPessoas = $this->fakePessoasData();

        $this->json('PUT', '/api/v1/pessoas/'.$pessoas->id, $editedPessoas);

        $this->assertApiResponse($editedPessoas);
    }

    /**
     * @test
     */
    public function testDeletePessoas()
    {
        $pessoas = $this->makePessoas();
        $this->json('DELETE', '/api/v1/pessoas/'.$pessoas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pessoas/'.$pessoas->id);

        $this->assertResponseStatus(404);
    }
}
