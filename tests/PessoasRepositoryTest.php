<?php

use App\Models\Pessoas;
use App\Repositories\PessoasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PessoasRepositoryTest extends TestCase
{
    use MakePessoasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PessoasRepository
     */
    protected $pessoasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pessoasRepo = App::make(PessoasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePessoas()
    {
        $pessoas = $this->fakePessoasData();
        $createdPessoas = $this->pessoasRepo->create($pessoas);
        $createdPessoas = $createdPessoas->toArray();
        $this->assertArrayHasKey('id', $createdPessoas);
        $this->assertNotNull($createdPessoas['id'], 'Created Pessoas must have id specified');
        $this->assertNotNull(Pessoas::find($createdPessoas['id']), 'Pessoas with given id must be in DB');
        $this->assertModelData($pessoas, $createdPessoas);
    }

    /**
     * @test read
     */
    public function testReadPessoas()
    {
        $pessoas = $this->makePessoas();
        $dbPessoas = $this->pessoasRepo->find($pessoas->id);
        $dbPessoas = $dbPessoas->toArray();
        $this->assertModelData($pessoas->toArray(), $dbPessoas);
    }

    /**
     * @test update
     */
    public function testUpdatePessoas()
    {
        $pessoas = $this->makePessoas();
        $fakePessoas = $this->fakePessoasData();
        $updatedPessoas = $this->pessoasRepo->update($fakePessoas, $pessoas->id);
        $this->assertModelData($fakePessoas, $updatedPessoas->toArray());
        $dbPessoas = $this->pessoasRepo->find($pessoas->id);
        $this->assertModelData($fakePessoas, $dbPessoas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePessoas()
    {
        $pessoas = $this->makePessoas();
        $resp = $this->pessoasRepo->delete($pessoas->id);
        $this->assertTrue($resp);
        $this->assertNull(Pessoas::find($pessoas->id), 'Pessoas should not exist in DB');
    }
}
