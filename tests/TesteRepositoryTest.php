<?php

use App\Models\Teste;
use App\Repositories\TesteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TesteRepositoryTest extends TestCase
{
    use MakeTesteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TesteRepository
     */
    protected $testeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->testeRepo = App::make(TesteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTeste()
    {
        $teste = $this->fakeTesteData();
        $createdTeste = $this->testeRepo->create($teste);
        $createdTeste = $createdTeste->toArray();
        $this->assertArrayHasKey('id', $createdTeste);
        $this->assertNotNull($createdTeste['id'], 'Created Teste must have id specified');
        $this->assertNotNull(Teste::find($createdTeste['id']), 'Teste with given id must be in DB');
        $this->assertModelData($teste, $createdTeste);
    }

    /**
     * @test read
     */
    public function testReadTeste()
    {
        $teste = $this->makeTeste();
        $dbTeste = $this->testeRepo->find($teste->id);
        $dbTeste = $dbTeste->toArray();
        $this->assertModelData($teste->toArray(), $dbTeste);
    }

    /**
     * @test update
     */
    public function testUpdateTeste()
    {
        $teste = $this->makeTeste();
        $fakeTeste = $this->fakeTesteData();
        $updatedTeste = $this->testeRepo->update($fakeTeste, $teste->id);
        $this->assertModelData($fakeTeste, $updatedTeste->toArray());
        $dbTeste = $this->testeRepo->find($teste->id);
        $this->assertModelData($fakeTeste, $dbTeste->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTeste()
    {
        $teste = $this->makeTeste();
        $resp = $this->testeRepo->delete($teste->id);
        $this->assertTrue($resp);
        $this->assertNull(Teste::find($teste->id), 'Teste should not exist in DB');
    }
}
