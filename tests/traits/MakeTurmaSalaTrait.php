<?php

use Faker\Factory as Faker;
use App\Models\TurmaSala;
use App\Repositories\TurmaSalaRepository;

trait MakeTurmaSalaTrait
{
    /**
     * Create fake instance of TurmaSala and save it in database
     *
     * @param array $turmaSalaFields
     * @return TurmaSala
     */
    public function makeTurmaSala($turmaSalaFields = [])
    {
        /** @var TurmaSalaRepository $turmaSalaRepo */
        $turmaSalaRepo = App::make(TurmaSalaRepository::class);
        $theme = $this->fakeTurmaSalaData($turmaSalaFields);
        return $turmaSalaRepo->create($theme);
    }

    /**
     * Get fake instance of TurmaSala
     *
     * @param array $turmaSalaFields
     * @return TurmaSala
     */
    public function fakeTurmaSala($turmaSalaFields = [])
    {
        return new TurmaSala($this->fakeTurmaSalaData($turmaSalaFields));
    }

    /**
     * Get fake data of TurmaSala
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTurmaSalaData($turmaSalaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'turma_id' => $fake->randomDigitNotNull,
            'sala_id' => $fake->randomDigitNotNull,
            'dia_semana' => $fake->randomDigitNotNull,
            'hora_inicio' => $fake->word,
            'hora_fim' => $fake->word
        ], $turmaSalaFields);
    }
}
