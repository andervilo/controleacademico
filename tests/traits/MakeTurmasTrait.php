<?php

use Faker\Factory as Faker;
use App\Models\Turmas;
use App\Repositories\TurmasRepository;

trait MakeTurmasTrait
{
    /**
     * Create fake instance of Turmas and save it in database
     *
     * @param array $turmasFields
     * @return Turmas
     */
    public function makeTurmas($turmasFields = [])
    {
        /** @var TurmasRepository $turmasRepo */
        $turmasRepo = App::make(TurmasRepository::class);
        $theme = $this->fakeTurmasData($turmasFields);
        return $turmasRepo->create($theme);
    }

    /**
     * Get fake instance of Turmas
     *
     * @param array $turmasFields
     * @return Turmas
     */
    public function fakeTurmas($turmasFields = [])
    {
        return new Turmas($this->fakeTurmasData($turmasFields));
    }

    /**
     * Get fake data of Turmas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTurmasData($turmasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'curso_id' => $fake->randomDigitNotNull,
            'professor_id' => $fake->randomDigitNotNull,
            'identificador' => $fake->word
        ], $turmasFields);
    }
}
