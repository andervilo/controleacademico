<?php

use Faker\Factory as Faker;
use App\Models\Salas;
use App\Repositories\SalasRepository;

trait MakeSalasTrait
{
    /**
     * Create fake instance of Salas and save it in database
     *
     * @param array $salasFields
     * @return Salas
     */
    public function makeSalas($salasFields = [])
    {
        /** @var SalasRepository $salasRepo */
        $salasRepo = App::make(SalasRepository::class);
        $theme = $this->fakeSalasData($salasFields);
        return $salasRepo->create($theme);
    }

    /**
     * Get fake instance of Salas
     *
     * @param array $salasFields
     * @return Salas
     */
    public function fakeSalas($salasFields = [])
    {
        return new Salas($this->fakeSalasData($salasFields));
    }

    /**
     * Get fake data of Salas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSalasData($salasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'numero' => $fake->randomDigitNotNull,
            'capacidade' => $fake->randomDigitNotNull,
            'setor' => $fake->word,
            'andar' => $fake->randomDigitNotNull,
            'corredor' => $fake->randomDigitNotNull
        ], $salasFields);
    }
}
