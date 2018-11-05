<?php

use App\Models\TurmaSala;
use App\Repositories\TurmaSalaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TurmaSalaRepositoryTest extends TestCase
{
    use MakeTurmaSalaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TurmaSalaRepository
     */
    protected $turmaSalaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->turmaSalaRepo = App::make(TurmaSalaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTurmaSala()
    {
        $turmaSala = $this->fakeTurmaSalaData();
        $createdTurmaSala = $this->turmaSalaRepo->create($turmaSala);
        $createdTurmaSala = $createdTurmaSala->toArray();
        $this->assertArrayHasKey('id', $createdTurmaSala);
        $this->assertNotNull($createdTurmaSala['id'], 'Created TurmaSala must have id specified');
        $this->assertNotNull(TurmaSala::find($createdTurmaSala['id']), 'TurmaSala with given id must be in DB');
        $this->assertModelData($turmaSala, $createdTurmaSala);
    }

    /**
     * @test read
     */
    public function testReadTurmaSala()
    {
        $turmaSala = $this->makeTurmaSala();
        $dbTurmaSala = $this->turmaSalaRepo->find($turmaSala->id);
        $dbTurmaSala = $dbTurmaSala->toArray();
        $this->assertModelData($turmaSala->toArray(), $dbTurmaSala);
    }

    /**
     * @test update
     */
    public function testUpdateTurmaSala()
    {
        $turmaSala = $this->makeTurmaSala();
        $fakeTurmaSala = $this->fakeTurmaSalaData();
        $updatedTurmaSala = $this->turmaSalaRepo->update($fakeTurmaSala, $turmaSala->id);
        $this->assertModelData($fakeTurmaSala, $updatedTurmaSala->toArray());
        $dbTurmaSala = $this->turmaSalaRepo->find($turmaSala->id);
        $this->assertModelData($fakeTurmaSala, $dbTurmaSala->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTurmaSala()
    {
        $turmaSala = $this->makeTurmaSala();
        $resp = $this->turmaSalaRepo->delete($turmaSala->id);
        $this->assertTrue($resp);
        $this->assertNull(TurmaSala::find($turmaSala->id), 'TurmaSala should not exist in DB');
    }
}
