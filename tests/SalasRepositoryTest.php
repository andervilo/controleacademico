<?php

use App\Models\Salas;
use App\Repositories\SalasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SalasRepositoryTest extends TestCase
{
    use MakeSalasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SalasRepository
     */
    protected $salasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->salasRepo = App::make(SalasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSalas()
    {
        $salas = $this->fakeSalasData();
        $createdSalas = $this->salasRepo->create($salas);
        $createdSalas = $createdSalas->toArray();
        $this->assertArrayHasKey('id', $createdSalas);
        $this->assertNotNull($createdSalas['id'], 'Created Salas must have id specified');
        $this->assertNotNull(Salas::find($createdSalas['id']), 'Salas with given id must be in DB');
        $this->assertModelData($salas, $createdSalas);
    }

    /**
     * @test read
     */
    public function testReadSalas()
    {
        $salas = $this->makeSalas();
        $dbSalas = $this->salasRepo->find($salas->id);
        $dbSalas = $dbSalas->toArray();
        $this->assertModelData($salas->toArray(), $dbSalas);
    }

    /**
     * @test update
     */
    public function testUpdateSalas()
    {
        $salas = $this->makeSalas();
        $fakeSalas = $this->fakeSalasData();
        $updatedSalas = $this->salasRepo->update($fakeSalas, $salas->id);
        $this->assertModelData($fakeSalas, $updatedSalas->toArray());
        $dbSalas = $this->salasRepo->find($salas->id);
        $this->assertModelData($fakeSalas, $dbSalas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSalas()
    {
        $salas = $this->makeSalas();
        $resp = $this->salasRepo->delete($salas->id);
        $this->assertTrue($resp);
        $this->assertNull(Salas::find($salas->id), 'Salas should not exist in DB');
    }
}
