<?php

use App\Models\Periodos;
use App\Repositories\PeriodosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodosRepositoryTest extends TestCase
{
    use MakePeriodosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PeriodosRepository
     */
    protected $periodosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->periodosRepo = App::make(PeriodosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePeriodos()
    {
        $periodos = $this->fakePeriodosData();
        $createdPeriodos = $this->periodosRepo->create($periodos);
        $createdPeriodos = $createdPeriodos->toArray();
        $this->assertArrayHasKey('id', $createdPeriodos);
        $this->assertNotNull($createdPeriodos['id'], 'Created Periodos must have id specified');
        $this->assertNotNull(Periodos::find($createdPeriodos['id']), 'Periodos with given id must be in DB');
        $this->assertModelData($periodos, $createdPeriodos);
    }

    /**
     * @test read
     */
    public function testReadPeriodos()
    {
        $periodos = $this->makePeriodos();
        $dbPeriodos = $this->periodosRepo->find($periodos->id);
        $dbPeriodos = $dbPeriodos->toArray();
        $this->assertModelData($periodos->toArray(), $dbPeriodos);
    }

    /**
     * @test update
     */
    public function testUpdatePeriodos()
    {
        $periodos = $this->makePeriodos();
        $fakePeriodos = $this->fakePeriodosData();
        $updatedPeriodos = $this->periodosRepo->update($fakePeriodos, $periodos->id);
        $this->assertModelData($fakePeriodos, $updatedPeriodos->toArray());
        $dbPeriodos = $this->periodosRepo->find($periodos->id);
        $this->assertModelData($fakePeriodos, $dbPeriodos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePeriodos()
    {
        $periodos = $this->makePeriodos();
        $resp = $this->periodosRepo->delete($periodos->id);
        $this->assertTrue($resp);
        $this->assertNull(Periodos::find($periodos->id), 'Periodos should not exist in DB');
    }
}
