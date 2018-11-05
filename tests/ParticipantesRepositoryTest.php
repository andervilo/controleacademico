<?php

use App\Models\Participantes;
use App\Repositories\ParticipantesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipantesRepositoryTest extends TestCase
{
    use MakeParticipantesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParticipantesRepository
     */
    protected $participantesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->participantesRepo = App::make(ParticipantesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateParticipantes()
    {
        $participantes = $this->fakeParticipantesData();
        $createdParticipantes = $this->participantesRepo->create($participantes);
        $createdParticipantes = $createdParticipantes->toArray();
        $this->assertArrayHasKey('id', $createdParticipantes);
        $this->assertNotNull($createdParticipantes['id'], 'Created Participantes must have id specified');
        $this->assertNotNull(Participantes::find($createdParticipantes['id']), 'Participantes with given id must be in DB');
        $this->assertModelData($participantes, $createdParticipantes);
    }

    /**
     * @test read
     */
    public function testReadParticipantes()
    {
        $participantes = $this->makeParticipantes();
        $dbParticipantes = $this->participantesRepo->find($participantes->id);
        $dbParticipantes = $dbParticipantes->toArray();
        $this->assertModelData($participantes->toArray(), $dbParticipantes);
    }

    /**
     * @test update
     */
    public function testUpdateParticipantes()
    {
        $participantes = $this->makeParticipantes();
        $fakeParticipantes = $this->fakeParticipantesData();
        $updatedParticipantes = $this->participantesRepo->update($fakeParticipantes, $participantes->id);
        $this->assertModelData($fakeParticipantes, $updatedParticipantes->toArray());
        $dbParticipantes = $this->participantesRepo->find($participantes->id);
        $this->assertModelData($fakeParticipantes, $dbParticipantes->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteParticipantes()
    {
        $participantes = $this->makeParticipantes();
        $resp = $this->participantesRepo->delete($participantes->id);
        $this->assertTrue($resp);
        $this->assertNull(Participantes::find($participantes->id), 'Participantes should not exist in DB');
    }
}
