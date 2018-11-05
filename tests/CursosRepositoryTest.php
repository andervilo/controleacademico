<?php

use App\Models\Cursos;
use App\Repositories\CursosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CursosRepositoryTest extends TestCase
{
    use MakeCursosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CursosRepository
     */
    protected $cursosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cursosRepo = App::make(CursosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCursos()
    {
        $cursos = $this->fakeCursosData();
        $createdCursos = $this->cursosRepo->create($cursos);
        $createdCursos = $createdCursos->toArray();
        $this->assertArrayHasKey('id', $createdCursos);
        $this->assertNotNull($createdCursos['id'], 'Created Cursos must have id specified');
        $this->assertNotNull(Cursos::find($createdCursos['id']), 'Cursos with given id must be in DB');
        $this->assertModelData($cursos, $createdCursos);
    }

    /**
     * @test read
     */
    public function testReadCursos()
    {
        $cursos = $this->makeCursos();
        $dbCursos = $this->cursosRepo->find($cursos->id);
        $dbCursos = $dbCursos->toArray();
        $this->assertModelData($cursos->toArray(), $dbCursos);
    }

    /**
     * @test update
     */
    public function testUpdateCursos()
    {
        $cursos = $this->makeCursos();
        $fakeCursos = $this->fakeCursosData();
        $updatedCursos = $this->cursosRepo->update($fakeCursos, $cursos->id);
        $this->assertModelData($fakeCursos, $updatedCursos->toArray());
        $dbCursos = $this->cursosRepo->find($cursos->id);
        $this->assertModelData($fakeCursos, $dbCursos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCursos()
    {
        $cursos = $this->makeCursos();
        $resp = $this->cursosRepo->delete($cursos->id);
        $this->assertTrue($resp);
        $this->assertNull(Cursos::find($cursos->id), 'Cursos should not exist in DB');
    }
}
