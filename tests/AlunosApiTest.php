<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlunosApiTest extends TestCase
{
    use MakeAlunosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAlunos()
    {
        $alunos = $this->fakeAlunosData();
        $this->json('POST', '/api/v1/alunos', $alunos);

        $this->assertApiResponse($alunos);
    }

    /**
     * @test
     */
    public function testReadAlunos()
    {
        $alunos = $this->makeAlunos();
        $this->json('GET', '/api/v1/alunos/'.$alunos->id);

        $this->assertApiResponse($alunos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAlunos()
    {
        $alunos = $this->makeAlunos();
        $editedAlunos = $this->fakeAlunosData();

        $this->json('PUT', '/api/v1/alunos/'.$alunos->id, $editedAlunos);

        $this->assertApiResponse($editedAlunos);
    }

    /**
     * @test
     */
    public function testDeleteAlunos()
    {
        $alunos = $this->makeAlunos();
        $this->json('DELETE', '/api/v1/alunos/'.$alunos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/alunos/'.$alunos->id);

        $this->assertResponseStatus(404);
    }
}
