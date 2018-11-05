<?php

use App\Models\Coordenador;
use App\Repositories\CoordenadorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoordenadorRepositoryTest extends TestCase
{
    use MakeCoordenadorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoordenadorRepository
     */
    protected $coordenadorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->coordenadorRepo = App::make(CoordenadorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCoordenador()
    {
        $coordenador = $this->fakeCoordenadorData();
        $createdCoordenador = $this->coordenadorRepo->create($coordenador);
        $createdCoordenador = $createdCoordenador->toArray();
        $this->assertArrayHasKey('id', $createdCoordenador);
        $this->assertNotNull($createdCoordenador['id'], 'Created Coordenador must have id specified');
        $this->assertNotNull(Coordenador::find($createdCoordenador['id']), 'Coordenador with given id must be in DB');
        $this->assertModelData($coordenador, $createdCoordenador);
    }

    /**
     * @test read
     */
    public function testReadCoordenador()
    {
        $coordenador = $this->makeCoordenador();
        $dbCoordenador = $this->coordenadorRepo->find($coordenador->id);
        $dbCoordenador = $dbCoordenador->toArray();
        $this->assertModelData($coordenador->toArray(), $dbCoordenador);
    }

    /**
     * @test update
     */
    public function testUpdateCoordenador()
    {
        $coordenador = $this->makeCoordenador();
        $fakeCoordenador = $this->fakeCoordenadorData();
        $updatedCoordenador = $this->coordenadorRepo->update($fakeCoordenador, $coordenador->id);
        $this->assertModelData($fakeCoordenador, $updatedCoordenador->toArray());
        $dbCoordenador = $this->coordenadorRepo->find($coordenador->id);
        $this->assertModelData($fakeCoordenador, $dbCoordenador->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCoordenador()
    {
        $coordenador = $this->makeCoordenador();
        $resp = $this->coordenadorRepo->delete($coordenador->id);
        $this->assertTrue($resp);
        $this->assertNull(Coordenador::find($coordenador->id), 'Coordenador should not exist in DB');
    }
}
