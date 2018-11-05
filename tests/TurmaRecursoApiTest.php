<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TurmaRecursoApiTest extends TestCase
{
    use MakeTurmaRecursoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTurmaRecurso()
    {
        $turmaRecurso = $this->fakeTurmaRecursoData();
        $this->json('POST', '/api/v1/turmaRecursos', $turmaRecurso);

        $this->assertApiResponse($turmaRecurso);
    }

    /**
     * @test
     */
    public function testReadTurmaRecurso()
    {
        $turmaRecurso = $this->makeTurmaRecurso();
        $this->json('GET', '/api/v1/turmaRecursos/'.$turmaRecurso->id);

        $this->assertApiResponse($turmaRecurso->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTurmaRecurso()
    {
        $turmaRecurso = $this->makeTurmaRecurso();
        $editedTurmaRecurso = $this->fakeTurmaRecursoData();

        $this->json('PUT', '/api/v1/turmaRecursos/'.$turmaRecurso->id, $editedTurmaRecurso);

        $this->assertApiResponse($editedTurmaRecurso);
    }

    /**
     * @test
     */
    public function testDeleteTurmaRecurso()
    {
        $turmaRecurso = $this->makeTurmaRecurso();
        $this->json('DELETE', '/api/v1/turmaRecursos/'.$turmaRecurso->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/turmaRecursos/'.$turmaRecurso->id);

        $this->assertResponseStatus(404);
    }
}
