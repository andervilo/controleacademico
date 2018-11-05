<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TurmasApiTest extends TestCase
{
    use MakeTurmasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTurmas()
    {
        $turmas = $this->fakeTurmasData();
        $this->json('POST', '/api/v1/turmas', $turmas);

        $this->assertApiResponse($turmas);
    }

    /**
     * @test
     */
    public function testReadTurmas()
    {
        $turmas = $this->makeTurmas();
        $this->json('GET', '/api/v1/turmas/'.$turmas->id);

        $this->assertApiResponse($turmas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTurmas()
    {
        $turmas = $this->makeTurmas();
        $editedTurmas = $this->fakeTurmasData();

        $this->json('PUT', '/api/v1/turmas/'.$turmas->id, $editedTurmas);

        $this->assertApiResponse($editedTurmas);
    }

    /**
     * @test
     */
    public function testDeleteTurmas()
    {
        $turmas = $this->makeTurmas();
        $this->json('DELETE', '/api/v1/turmas/'.$turmas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/turmas/'.$turmas->id);

        $this->assertResponseStatus(404);
    }
}
