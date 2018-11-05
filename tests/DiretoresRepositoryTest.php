<?php

use App\Models\Diretores;
use App\Repositories\DiretoresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DiretoresRepositoryTest extends TestCase
{
    use MakeDiretoresTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DiretoresRepository
     */
    protected $diretoresRepo;

    public function setUp()
    {
        parent::setUp();
        $this->diretoresRepo = App::make(DiretoresRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDiretores()
    {
        $diretores = $this->fakeDiretoresData();
        $createdDiretores = $this->diretoresRepo->create($diretores);
        $createdDiretores = $createdDiretores->toArray();
        $this->assertArrayHasKey('id', $createdDiretores);
        $this->assertNotNull($createdDiretores['id'], 'Created Diretores must have id specified');
        $this->assertNotNull(Diretores::find($createdDiretores['id']), 'Diretores with given id must be in DB');
        $this->assertModelData($diretores, $createdDiretores);
    }

    /**
     * @test read
     */
    public function testReadDiretores()
    {
        $diretores = $this->makeDiretores();
        $dbDiretores = $this->diretoresRepo->find($diretores->id);
        $dbDiretores = $dbDiretores->toArray();
        $this->assertModelData($diretores->toArray(), $dbDiretores);
    }

    /**
     * @test update
     */
    public function testUpdateDiretores()
    {
        $diretores = $this->makeDiretores();
        $fakeDiretores = $this->fakeDiretoresData();
        $updatedDiretores = $this->diretoresRepo->update($fakeDiretores, $diretores->id);
        $this->assertModelData($fakeDiretores, $updatedDiretores->toArray());
        $dbDiretores = $this->diretoresRepo->find($diretores->id);
        $this->assertModelData($fakeDiretores, $dbDiretores->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDiretores()
    {
        $diretores = $this->makeDiretores();
        $resp = $this->diretoresRepo->delete($diretores->id);
        $this->assertTrue($resp);
        $this->assertNull(Diretores::find($diretores->id), 'Diretores should not exist in DB');
    }
}
