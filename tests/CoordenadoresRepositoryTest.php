<?php

use App\Models\Coordenadores;
use App\Repositories\CoordenadoresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoordenadoresRepositoryTest extends TestCase
{
    use MakeCoordenadoresTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoordenadoresRepository
     */
    protected $coordenadoresRepo;

    public function setUp()
    {
        parent::setUp();
        $this->coordenadoresRepo = App::make(CoordenadoresRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCoordenadores()
    {
        $coordenadores = $this->fakeCoordenadoresData();
        $createdCoordenadores = $this->coordenadoresRepo->create($coordenadores);
        $createdCoordenadores = $createdCoordenadores->toArray();
        $this->assertArrayHasKey('id', $createdCoordenadores);
        $this->assertNotNull($createdCoordenadores['id'], 'Created Coordenadores must have id specified');
        $this->assertNotNull(Coordenadores::find($createdCoordenadores['id']), 'Coordenadores with given id must be in DB');
        $this->assertModelData($coordenadores, $createdCoordenadores);
    }

    /**
     * @test read
     */
    public function testReadCoordenadores()
    {
        $coordenadores = $this->makeCoordenadores();
        $dbCoordenadores = $this->coordenadoresRepo->find($coordenadores->id);
        $dbCoordenadores = $dbCoordenadores->toArray();
        $this->assertModelData($coordenadores->toArray(), $dbCoordenadores);
    }

    /**
     * @test update
     */
    public function testUpdateCoordenadores()
    {
        $coordenadores = $this->makeCoordenadores();
        $fakeCoordenadores = $this->fakeCoordenadoresData();
        $updatedCoordenadores = $this->coordenadoresRepo->update($fakeCoordenadores, $coordenadores->id);
        $this->assertModelData($fakeCoordenadores, $updatedCoordenadores->toArray());
        $dbCoordenadores = $this->coordenadoresRepo->find($coordenadores->id);
        $this->assertModelData($fakeCoordenadores, $dbCoordenadores->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCoordenadores()
    {
        $coordenadores = $this->makeCoordenadores();
        $resp = $this->coordenadoresRepo->delete($coordenadores->id);
        $this->assertTrue($resp);
        $this->assertNull(Coordenadores::find($coordenadores->id), 'Coordenadores should not exist in DB');
    }
}
