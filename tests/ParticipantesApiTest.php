<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipantesApiTest extends TestCase
{
    use MakeParticipantesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateParticipantes()
    {
        $participantes = $this->fakeParticipantesData();
        $this->json('POST', '/api/v1/participantes', $participantes);

        $this->assertApiResponse($participantes);
    }

    /**
     * @test
     */
    public function testReadParticipantes()
    {
        $participantes = $this->makeParticipantes();
        $this->json('GET', '/api/v1/participantes/'.$participantes->id);

        $this->assertApiResponse($participantes->toArray());
    }

    /**
     * @test
     */
    public function testUpdateParticipantes()
    {
        $participantes = $this->makeParticipantes();
        $editedParticipantes = $this->fakeParticipantesData();

        $this->json('PUT', '/api/v1/participantes/'.$participantes->id, $editedParticipantes);

        $this->assertApiResponse($editedParticipantes);
    }

    /**
     * @test
     */
    public function testDeleteParticipantes()
    {
        $participantes = $this->makeParticipantes();
        $this->json('DELETE', '/api/v1/participantes/'.$participantes->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/participantes/'.$participantes->id);

        $this->assertResponseStatus(404);
    }
}
