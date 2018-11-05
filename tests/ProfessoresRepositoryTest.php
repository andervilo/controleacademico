<?php

use App\Models\Professores;
use App\Repositories\ProfessoresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessoresRepositoryTest extends TestCase
{
    use MakeProfessoresTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfessoresRepository
     */
    protected $professoresRepo;

    public function setUp()
    {
        parent::setUp();
        $this->professoresRepo = App::make(ProfessoresRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProfessores()
    {
        $professores = $this->fakeProfessoresData();
        $createdProfessores = $this->professoresRepo->create($professores);
        $createdProfessores = $createdProfessores->toArray();
        $this->assertArrayHasKey('id', $createdProfessores);
        $this->assertNotNull($createdProfessores['id'], 'Created Professores must have id specified');
        $this->assertNotNull(Professores::find($createdProfessores['id']), 'Professores with given id must be in DB');
        $this->assertModelData($professores, $createdProfessores);
    }

    /**
     * @test read
     */
    public function testReadProfessores()
    {
        $professores = $this->makeProfessores();
        $dbProfessores = $this->professoresRepo->find($professores->id);
        $dbProfessores = $dbProfessores->toArray();
        $this->assertModelData($professores->toArray(), $dbProfessores);
    }

    /**
     * @test update
     */
    public function testUpdateProfessores()
    {
        $professores = $this->makeProfessores();
        $fakeProfessores = $this->fakeProfessoresData();
        $updatedProfessores = $this->professoresRepo->update($fakeProfessores, $professores->id);
        $this->assertModelData($fakeProfessores, $updatedProfessores->toArray());
        $dbProfessores = $this->professoresRepo->find($professores->id);
        $this->assertModelData($fakeProfessores, $dbProfessores->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProfessores()
    {
        $professores = $this->makeProfessores();
        $resp = $this->professoresRepo->delete($professores->id);
        $this->assertTrue($resp);
        $this->assertNull(Professores::find($professores->id), 'Professores should not exist in DB');
    }
}
