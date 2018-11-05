<?php

use App\Models\Turmas;
use App\Repositories\TurmasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TurmasRepositoryTest extends TestCase
{
    use MakeTurmasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TurmasRepository
     */
    protected $turmasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->turmasRepo = App::make(TurmasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTurmas()
    {
        $turmas = $this->fakeTurmasData();
        $createdTurmas = $this->turmasRepo->create($turmas);
        $createdTurmas = $createdTurmas->toArray();
        $this->assertArrayHasKey('id', $createdTurmas);
        $this->assertNotNull($createdTurmas['id'], 'Created Turmas must have id specified');
        $this->assertNotNull(Turmas::find($createdTurmas['id']), 'Turmas with given id must be in DB');
        $this->assertModelData($turmas, $createdTurmas);
    }

    /**
     * @test read
     */
    public function testReadTurmas()
    {
        $turmas = $this->makeTurmas();
        $dbTurmas = $this->turmasRepo->find($turmas->id);
        $dbTurmas = $dbTurmas->toArray();
        $this->assertModelData($turmas->toArray(), $dbTurmas);
    }

    /**
     * @test update
     */
    public function testUpdateTurmas()
    {
        $turmas = $this->makeTurmas();
        $fakeTurmas = $this->fakeTurmasData();
        $updatedTurmas = $this->turmasRepo->update($fakeTurmas, $turmas->id);
        $this->assertModelData($fakeTurmas, $updatedTurmas->toArray());
        $dbTurmas = $this->turmasRepo->find($turmas->id);
        $this->assertModelData($fakeTurmas, $dbTurmas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTurmas()
    {
        $turmas = $this->makeTurmas();
        $resp = $this->turmasRepo->delete($turmas->id);
        $this->assertTrue($resp);
        $this->assertNull(Turmas::find($turmas->id), 'Turmas should not exist in DB');
    }
}
