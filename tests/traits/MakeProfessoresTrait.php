<?php

use Faker\Factory as Faker;
use App\Models\Professores;
use App\Repositories\ProfessoresRepository;

trait MakeProfessoresTrait
{
    /**
     * Create fake instance of Professores and save it in database
     *
     * @param array $professoresFields
     * @return Professores
     */
    public function makeProfessores($professoresFields = [])
    {
        /** @var ProfessoresRepository $professoresRepo */
        $professoresRepo = App::make(ProfessoresRepository::class);
        $theme = $this->fakeProfessoresData($professoresFields);
        return $professoresRepo->create($theme);
    }

    /**
     * Get fake instance of Professores
     *
     * @param array $professoresFields
     * @return Professores
     */
    public function fakeProfessores($professoresFields = [])
    {
        return new Professores($this->fakeProfessoresData($professoresFields));
    }

    /**
     * Get fake data of Professores
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProfessoresData($professoresFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_funcional' => $fake->randomDigitNotNull,
            'pessoa_id' => $fake->randomDigitNotNull,
            'salario' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $professoresFields);
    }
}
