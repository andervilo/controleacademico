<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TurmaSalaApiTest extends TestCase
{
    use MakeTurmaSalaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTurmaSala()
    {
        $turmaSala = $this->fakeTurmaSalaData();
        $this->json('POST', '/api/v1/turmaSalas', $turmaSala);

        $this->assertApiResponse($turmaSala);
    }

    /**
     * @test
     */
    public function testReadTurmaSala()
    {
        $turmaSala = $this->makeTurmaSala();
        $this->json('GET', '/api/v1/turmaSalas/'.$turmaSala->id);

        $this->assertApiResponse($turmaSala->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTurmaSala()
    {
        $turmaSala = $this->makeTurmaSala();
        $editedTurmaSala = $this->fakeTurmaSalaData();

        $this->json('PUT', '/api/v1/turmaSalas/'.$turmaSala->id, $editedTurmaSala);

        $this->assertApiResponse($editedTurmaSala);
    }

    /**
     * @test
     */
    public function testDeleteTurmaSala()
    {
        $turmaSala = $this->makeTurmaSala();
        $this->json('DELETE', '/api/v1/turmaSalas/'.$turmaSala->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/turmaSalas/'.$turmaSala->id);

        $this->assertResponseStatus(404);
    }
}
