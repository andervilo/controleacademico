<?php

use Faker\Factory as Faker;
use App\Models\Coordenadores;
use App\Repositories\CoordenadoresRepository;

trait MakeCoordenadoresTrait
{
    /**
     * Create fake instance of Coordenadores and save it in database
     *
     * @param array $coordenadoresFields
     * @return Coordenadores
     */
    public function makeCoordenadores($coordenadoresFields = [])
    {
        /** @var CoordenadoresRepository $coordenadoresRepo */
        $coordenadoresRepo = App::make(CoordenadoresRepository::class);
        $theme = $this->fakeCoordenadoresData($coordenadoresFields);
        return $coordenadoresRepo->create($theme);
    }

    /**
     * Get fake instance of Coordenadores
     *
     * @param array $coordenadoresFields
     * @return Coordenadores
     */
    public function fakeCoordenadores($coordenadoresFields = [])
    {
        return new Coordenadores($this->fakeCoordenadoresData($coordenadoresFields));
    }

    /**
     * Get fake data of Coordenadores
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCoordenadoresData($coordenadoresFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_funcional' => $fake->randomDigitNotNull,
            'pessoa_id' => $fake->randomDigitNotNull,
            'salario' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $coordenadoresFields);
    }
}
