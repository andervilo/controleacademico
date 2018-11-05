<?php

use Faker\Factory as Faker;
use App\Models\Filmes;
use App\Repositories\FilmesRepository;

trait MakeFilmesTrait
{
    /**
     * Create fake instance of Filmes and save it in database
     *
     * @param array $filmesFields
     * @return Filmes
     */
    public function makeFilmes($filmesFields = [])
    {
        /** @var FilmesRepository $filmesRepo */
        $filmesRepo = App::make(FilmesRepository::class);
        $theme = $this->fakeFilmesData($filmesFields);
        return $filmesRepo->create($theme);
    }

    /**
     * Get fake instance of Filmes
     *
     * @param array $filmesFields
     * @return Filmes
     */
    public function fakeFilmes($filmesFields = [])
    {
        return new Filmes($this->fakeFilmesData($filmesFields));
    }

    /**
     * Get fake data of Filmes
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFilmesData($filmesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $filmesFields);
    }
}
