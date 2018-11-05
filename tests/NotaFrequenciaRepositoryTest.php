<?php

use App\Models\NotaFrequencia;
use App\Repositories\NotaFrequenciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotaFrequenciaRepositoryTest extends TestCase
{
    use MakeNotaFrequenciaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NotaFrequenciaRepository
     */
    protected $notaFrequenciaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->notaFrequenciaRepo = App::make(NotaFrequenciaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNotaFrequencia()
    {
        $notaFrequencia = $this->fakeNotaFrequenciaData();
        $createdNotaFrequencia = $this->notaFrequenciaRepo->create($notaFrequencia);
        $createdNotaFrequencia = $createdNotaFrequencia->toArray();
        $this->assertArrayHasKey('id', $createdNotaFrequencia);
        $this->assertNotNull($createdNotaFrequencia['id'], 'Created NotaFrequencia must have id specified');
        $this->assertNotNull(NotaFrequencia::find($createdNotaFrequencia['id']), 'NotaFrequencia with given id must be in DB');
        $this->assertModelData($notaFrequencia, $createdNotaFrequencia);
    }

    /**
     * @test read
     */
    public function testReadNotaFrequencia()
    {
        $notaFrequencia = $this->makeNotaFrequencia();
        $dbNotaFrequencia = $this->notaFrequenciaRepo->find($notaFrequencia->id);
        $dbNotaFrequencia = $dbNotaFrequencia->toArray();
        $this->assertModelData($notaFrequencia->toArray(), $dbNotaFrequencia);
    }

    /**
     * @test update
     */
    public function testUpdateNotaFrequencia()
    {
        $notaFrequencia = $this->makeNotaFrequencia();
        $fakeNotaFrequencia = $this->fakeNotaFrequenciaData();
        $updatedNotaFrequencia = $this->notaFrequenciaRepo->update($fakeNotaFrequencia, $notaFrequencia->id);
        $this->assertModelData($fakeNotaFrequencia, $updatedNotaFrequencia->toArray());
        $dbNotaFrequencia = $this->notaFrequenciaRepo->find($notaFrequencia->id);
        $this->assertModelData($fakeNotaFrequencia, $dbNotaFrequencia->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNotaFrequencia()
    {
        $notaFrequencia = $this->makeNotaFrequencia();
        $resp = $this->notaFrequenciaRepo->delete($notaFrequencia->id);
        $this->assertTrue($resp);
        $this->assertNull(NotaFrequencia::find($notaFrequencia->id), 'NotaFrequencia should not exist in DB');
    }
}
