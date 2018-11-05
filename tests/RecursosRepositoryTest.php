<?php

use App\Models\Recursos;
use App\Repositories\RecursosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecursosRepositoryTest extends TestCase
{
    use MakeRecursosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RecursosRepository
     */
    protected $recursosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->recursosRepo = App::make(RecursosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRecursos()
    {
        $recursos = $this->fakeRecursosData();
        $createdRecursos = $this->recursosRepo->create($recursos);
        $createdRecursos = $createdRecursos->toArray();
        $this->assertArrayHasKey('id', $createdRecursos);
        $this->assertNotNull($createdRecursos['id'], 'Created Recursos must have id specified');
        $this->assertNotNull(Recursos::find($createdRecursos['id']), 'Recursos with given id must be in DB');
        $this->assertModelData($recursos, $createdRecursos);
    }

    /**
     * @test read
     */
    public function testReadRecursos()
    {
        $recursos = $this->makeRecursos();
        $dbRecursos = $this->recursosRepo->find($recursos->id);
        $dbRecursos = $dbRecursos->toArray();
        $this->assertModelData($recursos->toArray(), $dbRecursos);
    }

    /**
     * @test update
     */
    public function testUpdateRecursos()
    {
        $recursos = $this->makeRecursos();
        $fakeRecursos = $this->fakeRecursosData();
        $updatedRecursos = $this->recursosRepo->update($fakeRecursos, $recursos->id);
        $this->assertModelData($fakeRecursos, $updatedRecursos->toArray());
        $dbRecursos = $this->recursosRepo->find($recursos->id);
        $this->assertModelData($fakeRecursos, $dbRecursos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRecursos()
    {
        $recursos = $this->makeRecursos();
        $resp = $this->recursosRepo->delete($recursos->id);
        $this->assertTrue($resp);
        $this->assertNull(Recursos::find($recursos->id), 'Recursos should not exist in DB');
    }
}
