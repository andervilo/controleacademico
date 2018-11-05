<?php

use App\Models\Filmes;
use App\Repositories\FilmesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FilmesRepositoryTest extends TestCase
{
    use MakeFilmesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FilmesRepository
     */
    protected $filmesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->filmesRepo = App::make(FilmesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFilmes()
    {
        $filmes = $this->fakeFilmesData();
        $createdFilmes = $this->filmesRepo->create($filmes);
        $createdFilmes = $createdFilmes->toArray();
        $this->assertArrayHasKey('id', $createdFilmes);
        $this->assertNotNull($createdFilmes['id'], 'Created Filmes must have id specified');
        $this->assertNotNull(Filmes::find($createdFilmes['id']), 'Filmes with given id must be in DB');
        $this->assertModelData($filmes, $createdFilmes);
    }

    /**
     * @test read
     */
    public function testReadFilmes()
    {
        $filmes = $this->makeFilmes();
        $dbFilmes = $this->filmesRepo->find($filmes->id);
        $dbFilmes = $dbFilmes->toArray();
        $this->assertModelData($filmes->toArray(), $dbFilmes);
    }

    /**
     * @test update
     */
    public function testUpdateFilmes()
    {
        $filmes = $this->makeFilmes();
        $fakeFilmes = $this->fakeFilmesData();
        $updatedFilmes = $this->filmesRepo->update($fakeFilmes, $filmes->id);
        $this->assertModelData($fakeFilmes, $updatedFilmes->toArray());
        $dbFilmes = $this->filmesRepo->find($filmes->id);
        $this->assertModelData($fakeFilmes, $dbFilmes->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFilmes()
    {
        $filmes = $this->makeFilmes();
        $resp = $this->filmesRepo->delete($filmes->id);
        $this->assertTrue($resp);
        $this->assertNull(Filmes::find($filmes->id), 'Filmes should not exist in DB');
    }
}
