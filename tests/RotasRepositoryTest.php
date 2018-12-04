<?php

use App\Models\Rotas;
use App\Repositories\RotasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RotasRepositoryTest extends TestCase
{
    use MakeRotasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RotasRepository
     */
    protected $rotasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rotasRepo = App::make(RotasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRotas()
    {
        $rotas = $this->fakeRotasData();
        $createdRotas = $this->rotasRepo->create($rotas);
        $createdRotas = $createdRotas->toArray();
        $this->assertArrayHasKey('id', $createdRotas);
        $this->assertNotNull($createdRotas['id'], 'Created Rotas must have id specified');
        $this->assertNotNull(Rotas::find($createdRotas['id']), 'Rotas with given id must be in DB');
        $this->assertModelData($rotas, $createdRotas);
    }

    /**
     * @test read
     */
    public function testReadRotas()
    {
        $rotas = $this->makeRotas();
        $dbRotas = $this->rotasRepo->find($rotas->id);
        $dbRotas = $dbRotas->toArray();
        $this->assertModelData($rotas->toArray(), $dbRotas);
    }

    /**
     * @test update
     */
    public function testUpdateRotas()
    {
        $rotas = $this->makeRotas();
        $fakeRotas = $this->fakeRotasData();
        $updatedRotas = $this->rotasRepo->update($fakeRotas, $rotas->id);
        $this->assertModelData($fakeRotas, $updatedRotas->toArray());
        $dbRotas = $this->rotasRepo->find($rotas->id);
        $this->assertModelData($fakeRotas, $dbRotas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRotas()
    {
        $rotas = $this->makeRotas();
        $resp = $this->rotasRepo->delete($rotas->id);
        $this->assertTrue($resp);
        $this->assertNull(Rotas::find($rotas->id), 'Rotas should not exist in DB');
    }
}
