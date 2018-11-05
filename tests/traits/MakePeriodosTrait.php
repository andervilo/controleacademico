<?php

use Faker\Factory as Faker;
use App\Models\Periodos;
use App\Repositories\PeriodosRepository;

trait MakePeriodosTrait
{
    /**
     * Create fake instance of Periodos and save it in database
     *
     * @param array $periodosFields
     * @return Periodos
     */
    public function makePeriodos($periodosFields = [])
    {
        /** @var PeriodosRepository $periodosRepo */
        $periodosRepo = App::make(PeriodosRepository::class);
        $theme = $this->fakePeriodosData($periodosFields);
        return $periodosRepo->create($theme);
    }

    /**
     * Get fake instance of Periodos
     *
     * @param array $periodosFields
     * @return Periodos
     */
    public function fakePeriodos($periodosFields = [])
    {
        return new Periodos($this->fakePeriodosData($periodosFields));
    }

    /**
     * Get fake data of Periodos
     *
     * @param array $postFields
     * @return array
     */
    public function fakePeriodosData($periodosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'escola_id' => $fake->randomDigitNotNull,
            'ano' => $fake->randomDigitNotNull,
            'anual' => $fake->word,
            'semestre1' => $fake->word,
            'semestre2' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $periodosFields);
    }
}
