<?php

use App\Models\CursoProfessor;
use App\Repositories\CursoProfessorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CursoProfessorRepositoryTest extends TestCase
{
    use MakeCursoProfessorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CursoProfessorRepository
     */
    protected $cursoProfessorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cursoProfessorRepo = App::make(CursoProfessorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCursoProfessor()
    {
        $cursoProfessor = $this->fakeCursoProfessorData();
        $createdCursoProfessor = $this->cursoProfessorRepo->create($cursoProfessor);
        $createdCursoProfessor = $createdCursoProfessor->toArray();
        $this->assertArrayHasKey('id', $createdCursoProfessor);
        $this->assertNotNull($createdCursoProfessor['id'], 'Created CursoProfessor must have id specified');
        $this->assertNotNull(CursoProfessor::find($createdCursoProfessor['id']), 'CursoProfessor with given id must be in DB');
        $this->assertModelData($cursoProfessor, $createdCursoProfessor);
    }

    /**
     * @test read
     */
    public function testReadCursoProfessor()
    {
        $cursoProfessor = $this->makeCursoProfessor();
        $dbCursoProfessor = $this->cursoProfessorRepo->find($cursoProfessor->id);
        $dbCursoProfessor = $dbCursoProfessor->toArray();
        $this->assertModelData($cursoProfessor->toArray(), $dbCursoProfessor);
    }

    /**
     * @test update
     */
    public function testUpdateCursoProfessor()
    {
        $cursoProfessor = $this->makeCursoProfessor();
        $fakeCursoProfessor = $this->fakeCursoProfessorData();
        $updatedCursoProfessor = $this->cursoProfessorRepo->update($fakeCursoProfessor, $cursoProfessor->id);
        $this->assertModelData($fakeCursoProfessor, $updatedCursoProfessor->toArray());
        $dbCursoProfessor = $this->cursoProfessorRepo->find($cursoProfessor->id);
        $this->assertModelData($fakeCursoProfessor, $dbCursoProfessor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCursoProfessor()
    {
        $cursoProfessor = $this->makeCursoProfessor();
        $resp = $this->cursoProfessorRepo->delete($cursoProfessor->id);
        $this->assertTrue($resp);
        $this->assertNull(CursoProfessor::find($cursoProfessor->id), 'CursoProfessor should not exist in DB');
    }
}
