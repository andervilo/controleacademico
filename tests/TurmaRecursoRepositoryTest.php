<?php

use App\Models\TurmaRecurso;
use App\Repositories\TurmaRecursoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TurmaRecursoRepositoryTest extends TestCase
{
    use MakeTurmaRecursoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TurmaRecursoRepository
     */
    protected $turmaRecursoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->turmaRecursoRepo = App::make(TurmaRecursoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTurmaRecurso()
    {
        $turmaRecurso = $this->fakeTurmaRecursoData();
        $createdTurmaRecurso = $this->turmaRecursoRepo->create($turmaRecurso);
        $createdTurmaRecurso = $createdTurmaRecurso->toArray();
        $this->assertArrayHasKey('id', $createdTurmaRecurso);
        $this->assertNotNull($createdTurmaRecurso['id'], 'Created TurmaRecurso must have id specified');
        $this->assertNotNull(TurmaRecurso::find($createdTurmaRecurso['id']), 'TurmaRecurso with given id must be in DB');
        $this->assertModelData($turmaRecurso, $createdTurmaRecurso);
    }

    /**
     * @test read
     */
    public function testReadTurmaRecurso()
    {
        $turmaRecurso = $this->makeTurmaRecurso();
        $dbTurmaRecurso = $this->turmaRecursoRepo->find($turmaRecurso->id);
        $dbTurmaRecurso = $dbTurmaRecurso->toArray();
        $this->assertModelData($turmaRecurso->toArray(), $dbTurmaRecurso);
    }

    /**
     * @test update
     */
    public function testUpdateTurmaRecurso()
    {
        $turmaRecurso = $this->makeTurmaRecurso();
        $fakeTurmaRecurso = $this->fakeTurmaRecursoData();
        $updatedTurmaRecurso = $this->turmaRecursoRepo->update($fakeTurmaRecurso, $turmaRecurso->id);
        $this->assertModelData($fakeTurmaRecurso, $updatedTurmaRecurso->toArray());
        $dbTurmaRecurso = $this->turmaRecursoRepo->find($turmaRecurso->id);
        $this->assertModelData($fakeTurmaRecurso, $dbTurmaRecurso->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTurmaRecurso()
    {
        $turmaRecurso = $this->makeTurmaRecurso();
        $resp = $this->turmaRecursoRepo->delete($turmaRecurso->id);
        $this->assertTrue($resp);
        $this->assertNull(TurmaRecurso::find($turmaRecurso->id), 'TurmaRecurso should not exist in DB');
    }
}
