<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CursosApiTest extends TestCase
{
    use MakeCursosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCursos()
    {
        $cursos = $this->fakeCursosData();
        $this->json('POST', '/api/v1/cursos', $cursos);

        $this->assertApiResponse($cursos);
    }

    /**
     * @test
     */
    public function testReadCursos()
    {
        $cursos = $this->makeCursos();
        $this->json('GET', '/api/v1/cursos/'.$cursos->id);

        $this->assertApiResponse($cursos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCursos()
    {
        $cursos = $this->makeCursos();
        $editedCursos = $this->fakeCursosData();

        $this->json('PUT', '/api/v1/cursos/'.$cursos->id, $editedCursos);

        $this->assertApiResponse($editedCursos);
    }

    /**
     * @test
     */
    public function testDeleteCursos()
    {
        $cursos = $this->makeCursos();
        $this->json('DELETE', '/api/v1/cursos/'.$cursos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cursos/'.$cursos->id);

        $this->assertResponseStatus(404);
    }
}
