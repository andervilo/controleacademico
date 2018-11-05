<?php

use App\Models\Actors;
use App\Repositories\ActorsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActorsRepositoryTest extends TestCase
{
    use MakeActorsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActorsRepository
     */
    protected $actorsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->actorsRepo = App::make(ActorsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateActors()
    {
        $actors = $this->fakeActorsData();
        $createdActors = $this->actorsRepo->create($actors);
        $createdActors = $createdActors->toArray();
        $this->assertArrayHasKey('id', $createdActors);
        $this->assertNotNull($createdActors['id'], 'Created Actors must have id specified');
        $this->assertNotNull(Actors::find($createdActors['id']), 'Actors with given id must be in DB');
        $this->assertModelData($actors, $createdActors);
    }

    /**
     * @test read
     */
    public function testReadActors()
    {
        $actors = $this->makeActors();
        $dbActors = $this->actorsRepo->find($actors->id);
        $dbActors = $dbActors->toArray();
        $this->assertModelData($actors->toArray(), $dbActors);
    }

    /**
     * @test update
     */
    public function testUpdateActors()
    {
        $actors = $this->makeActors();
        $fakeActors = $this->fakeActorsData();
        $updatedActors = $this->actorsRepo->update($fakeActors, $actors->id);
        $this->assertModelData($fakeActors, $updatedActors->toArray());
        $dbActors = $this->actorsRepo->find($actors->id);
        $this->assertModelData($fakeActors, $dbActors->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteActors()
    {
        $actors = $this->makeActors();
        $resp = $this->actorsRepo->delete($actors->id);
        $this->assertTrue($resp);
        $this->assertNull(Actors::find($actors->id), 'Actors should not exist in DB');
    }
}
