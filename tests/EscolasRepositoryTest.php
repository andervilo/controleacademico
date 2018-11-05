<?php

use App\Models\Escolas;
use App\Repositories\EscolasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EscolasRepositoryTest extends TestCase
{
    use MakeEscolasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EscolasRepository
     */
    protected $escolasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->escolasRepo = App::make(EscolasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEscolas()
    {
        $escolas = $this->fakeEscolasData();
        $createdEscolas = $this->escolasRepo->create($escolas);
        $createdEscolas = $createdEscolas->toArray();
        $this->assertArrayHasKey('id', $createdEscolas);
        $this->assertNotNull($createdEscolas['id'], 'Created Escolas must have id specified');
        $this->assertNotNull(Escolas::find($createdEscolas['id']), 'Escolas with given id must be in DB');
        $this->assertModelData($escolas, $createdEscolas);
    }

    /**
     * @test read
     */
    public function testReadEscolas()
    {
        $escolas = $this->makeEscolas();
        $dbEscolas = $this->escolasRepo->find($escolas->id);
        $dbEscolas = $dbEscolas->toArray();
        $this->assertModelData($escolas->toArray(), $dbEscolas);
    }

    /**
     * @test update
     */
    public function testUpdateEscolas()
    {
        $escolas = $this->makeEscolas();
        $fakeEscolas = $this->fakeEscolasData();
        $updatedEscolas = $this->escolasRepo->update($fakeEscolas, $escolas->id);
        $this->assertModelData($fakeEscolas, $updatedEscolas->toArray());
        $dbEscolas = $this->escolasRepo->find($escolas->id);
        $this->assertModelData($fakeEscolas, $dbEscolas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEscolas()
    {
        $escolas = $this->makeEscolas();
        $resp = $this->escolasRepo->delete($escolas->id);
        $this->assertTrue($resp);
        $this->assertNull(Escolas::find($escolas->id), 'Escolas should not exist in DB');
    }
}
