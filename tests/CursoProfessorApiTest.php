<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CursoProfessorApiTest extends TestCase
{
    use MakeCursoProfessorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCursoProfessor()
    {
        $cursoProfessor = $this->fakeCursoProfessorData();
        $this->json('POST', '/api/v1/cursoProfessors', $cursoProfessor);

        $this->assertApiResponse($cursoProfessor);
    }

    /**
     * @test
     */
    public function testReadCursoProfessor()
    {
        $cursoProfessor = $this->makeCursoProfessor();
        $this->json('GET', '/api/v1/cursoProfessors/'.$cursoProfessor->id);

        $this->assertApiResponse($cursoProfessor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCursoProfessor()
    {
        $cursoProfessor = $this->makeCursoProfessor();
        $editedCursoProfessor = $this->fakeCursoProfessorData();

        $this->json('PUT', '/api/v1/cursoProfessors/'.$cursoProfessor->id, $editedCursoProfessor);

        $this->assertApiResponse($editedCursoProfessor);
    }

    /**
     * @test
     */
    public function testDeleteCursoProfessor()
    {
        $cursoProfessor = $this->makeCursoProfessor();
        $this->json('DELETE', '/api/v1/cursoProfessors/'.$cursoProfessor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cursoProfessors/'.$cursoProfessor->id);

        $this->assertResponseStatus(404);
    }
}
