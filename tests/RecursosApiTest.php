<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecursosApiTest extends TestCase
{
    use MakeRecursosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRecursos()
    {
        $recursos = $this->fakeRecursosData();
        $this->json('POST', '/api/v1/recursos', $recursos);

        $this->assertApiResponse($recursos);
    }

    /**
     * @test
     */
    public function testReadRecursos()
    {
        $recursos = $this->makeRecursos();
        $this->json('GET', '/api/v1/recursos/'.$recursos->id);

        $this->assertApiResponse($recursos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRecursos()
    {
        $recursos = $this->makeRecursos();
        $editedRecursos = $this->fakeRecursosData();

        $this->json('PUT', '/api/v1/recursos/'.$recursos->id, $editedRecursos);

        $this->assertApiResponse($editedRecursos);
    }

    /**
     * @test
     */
    public function testDeleteRecursos()
    {
        $recursos = $this->makeRecursos();
        $this->json('DELETE', '/api/v1/recursos/'.$recursos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/recursos/'.$recursos->id);

        $this->assertResponseStatus(404);
    }
}
