<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FilmesApiTest extends TestCase
{
    use MakeFilmesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFilmes()
    {
        $filmes = $this->fakeFilmesData();
        $this->json('POST', '/api/v1/filmes', $filmes);

        $this->assertApiResponse($filmes);
    }

    /**
     * @test
     */
    public function testReadFilmes()
    {
        $filmes = $this->makeFilmes();
        $this->json('GET', '/api/v1/filmes/'.$filmes->id);

        $this->assertApiResponse($filmes->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFilmes()
    {
        $filmes = $this->makeFilmes();
        $editedFilmes = $this->fakeFilmesData();

        $this->json('PUT', '/api/v1/filmes/'.$filmes->id, $editedFilmes);

        $this->assertApiResponse($editedFilmes);
    }

    /**
     * @test
     */
    public function testDeleteFilmes()
    {
        $filmes = $this->makeFilmes();
        $this->json('DELETE', '/api/v1/filmes/'.$filmes->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/filmes/'.$filmes->id);

        $this->assertResponseStatus(404);
    }
}
