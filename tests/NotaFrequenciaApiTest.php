<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotaFrequenciaApiTest extends TestCase
{
    use MakeNotaFrequenciaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNotaFrequencia()
    {
        $notaFrequencia = $this->fakeNotaFrequenciaData();
        $this->json('POST', '/api/v1/notaFrequencias', $notaFrequencia);

        $this->assertApiResponse($notaFrequencia);
    }

    /**
     * @test
     */
    public function testReadNotaFrequencia()
    {
        $notaFrequencia = $this->makeNotaFrequencia();
        $this->json('GET', '/api/v1/notaFrequencias/'.$notaFrequencia->id);

        $this->assertApiResponse($notaFrequencia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNotaFrequencia()
    {
        $notaFrequencia = $this->makeNotaFrequencia();
        $editedNotaFrequencia = $this->fakeNotaFrequenciaData();

        $this->json('PUT', '/api/v1/notaFrequencias/'.$notaFrequencia->id, $editedNotaFrequencia);

        $this->assertApiResponse($editedNotaFrequencia);
    }

    /**
     * @test
     */
    public function testDeleteNotaFrequencia()
    {
        $notaFrequencia = $this->makeNotaFrequencia();
        $this->json('DELETE', '/api/v1/notaFrequencias/'.$notaFrequencia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/notaFrequencias/'.$notaFrequencia->id);

        $this->assertResponseStatus(404);
    }
}
