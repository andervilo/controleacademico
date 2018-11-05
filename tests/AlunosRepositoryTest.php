<?php

use App\Models\Alunos;
use App\Repositories\AlunosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlunosRepositoryTest extends TestCase
{
    use MakeAlunosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AlunosRepository
     */
    protected $alunosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->alunosRepo = App::make(AlunosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAlunos()
    {
        $alunos = $this->fakeAlunosData();
        $createdAlunos = $this->alunosRepo->create($alunos);
        $createdAlunos = $createdAlunos->toArray();
        $this->assertArrayHasKey('id', $createdAlunos);
        $this->assertNotNull($createdAlunos['id'], 'Created Alunos must have id specified');
        $this->assertNotNull(Alunos::find($createdAlunos['id']), 'Alunos with given id must be in DB');
        $this->assertModelData($alunos, $createdAlunos);
    }

    /**
     * @test read
     */
    public function testReadAlunos()
    {
        $alunos = $this->makeAlunos();
        $dbAlunos = $this->alunosRepo->find($alunos->id);
        $dbAlunos = $dbAlunos->toArray();
        $this->assertModelData($alunos->toArray(), $dbAlunos);
    }

    /**
     * @test update
     */
    public function testUpdateAlunos()
    {
        $alunos = $this->makeAlunos();
        $fakeAlunos = $this->fakeAlunosData();
        $updatedAlunos = $this->alunosRepo->update($fakeAlunos, $alunos->id);
        $this->assertModelData($fakeAlunos, $updatedAlunos->toArray());
        $dbAlunos = $this->alunosRepo->find($alunos->id);
        $this->assertModelData($fakeAlunos, $dbAlunos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAlunos()
    {
        $alunos = $this->makeAlunos();
        $resp = $this->alunosRepo->delete($alunos->id);
        $this->assertTrue($resp);
        $this->assertNull(Alunos::find($alunos->id), 'Alunos should not exist in DB');
    }
}
