<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActorsApiTest extends TestCase
{
    use MakeActorsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActors()
    {
        $actors = $this->fakeActorsData();
        $this->json('POST', '/api/v1/actors', $actors);

        $this->assertApiResponse($actors);
    }

    /**
     * @test
     */
    public function testReadActors()
    {
        $actors = $this->makeActors();
        $this->json('GET', '/api/v1/actors/'.$actors->id);

        $this->assertApiResponse($actors->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActors()
    {
        $actors = $this->makeActors();
        $editedActors = $this->fakeActorsData();

        $this->json('PUT', '/api/v1/actors/'.$actors->id, $editedActors);

        $this->assertApiResponse($editedActors);
    }

    /**
     * @test
     */
    public function testDeleteActors()
    {
        $actors = $this->makeActors();
        $this->json('DELETE', '/api/v1/actors/'.$actors->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/actors/'.$actors->id);

        $this->assertResponseStatus(404);
    }
}
