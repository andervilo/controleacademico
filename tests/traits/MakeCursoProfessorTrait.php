<?php

use Faker\Factory as Faker;
use App\Models\CursoProfessor;
use App\Repositories\CursoProfessorRepository;

trait MakeCursoProfessorTrait
{
    /**
     * Create fake instance of CursoProfessor and save it in database
     *
     * @param array $cursoProfessorFields
     * @return CursoProfessor
     */
    public function makeCursoProfessor($cursoProfessorFields = [])
    {
        /** @var CursoProfessorRepository $cursoProfessorRepo */
        $cursoProfessorRepo = App::make(CursoProfessorRepository::class);
        $theme = $this->fakeCursoProfessorData($cursoProfessorFields);
        return $cursoProfessorRepo->create($theme);
    }

    /**
     * Get fake instance of CursoProfessor
     *
     * @param array $cursoProfessorFields
     * @return CursoProfessor
     */
    public function fakeCursoProfessor($cursoProfessorFields = [])
    {
        return new CursoProfessor($this->fakeCursoProfessorData($cursoProfessorFields));
    }

    /**
     * Get fake data of CursoProfessor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCursoProfessorData($cursoProfessorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'curso_id' => $fake->randomDigitNotNull,
            'professor_id' => $fake->randomDigitNotNull
        ], $cursoProfessorFields);
    }
}
