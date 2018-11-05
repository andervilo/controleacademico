<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessoresApiTest extends TestCase
{
    use MakeProfessoresTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProfessores()
    {
        $professores = $this->fakeProfessoresData();
        $this->json('POST', '/api/v1/professores', $professores);

        $this->assertApiResponse($professores);
    }

    /**
     * @test
     */
    public function testReadProfessores()
    {
        $professores = $this->makeProfessores();
        $this->json('GET', '/api/v1/professores/'.$professores->id);

        $this->assertApiResponse($professores->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProfessores()
    {
        $professores = $this->makeProfessores();
        $editedProfessores = $this->fakeProfessoresData();

        $this->json('PUT', '/api/v1/professores/'.$professores->id, $editedProfessores);

        $this->assertApiResponse($editedProfessores);
    }

    /**
     * @test
     */
    public function testDeleteProfessores()
    {
        $professores = $this->makeProfessores();
        $this->json('DELETE', '/api/v1/professores/'.$professores->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/professores/'.$professores->id);

        $this->assertResponseStatus(404);
    }
}
