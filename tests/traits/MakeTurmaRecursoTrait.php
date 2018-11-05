<?php

use Faker\Factory as Faker;
use App\Models\TurmaRecurso;
use App\Repositories\TurmaRecursoRepository;

trait MakeTurmaRecursoTrait
{
    /**
     * Create fake instance of TurmaRecurso and save it in database
     *
     * @param array $turmaRecursoFields
     * @return TurmaRecurso
     */
    public function makeTurmaRecurso($turmaRecursoFields = [])
    {
        /** @var TurmaRecursoRepository $turmaRecursoRepo */
        $turmaRecursoRepo = App::make(TurmaRecursoRepository::class);
        $theme = $this->fakeTurmaRecursoData($turmaRecursoFields);
        return $turmaRecursoRepo->create($theme);
    }

    /**
     * Get fake instance of TurmaRecurso
     *
     * @param array $turmaRecursoFields
     * @return TurmaRecurso
     */
    public function fakeTurmaRecurso($turmaRecursoFields = [])
    {
        return new TurmaRecurso($this->fakeTurmaRecursoData($turmaRecursoFields));
    }

    /**
     * Get fake data of TurmaRecurso
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTurmaRecursoData($turmaRecursoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'recurso_id' => $fake->randomDigitNotNull,
            'turma_id' => $fake->randomDigitNotNull
        ], $turmaRecursoFields);
    }
}
