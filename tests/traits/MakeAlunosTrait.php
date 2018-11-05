<?php

use Faker\Factory as Faker;
use App\Models\Alunos;
use App\Repositories\AlunosRepository;

trait MakeAlunosTrait
{
    /**
     * Create fake instance of Alunos and save it in database
     *
     * @param array $alunosFields
     * @return Alunos
     */
    public function makeAlunos($alunosFields = [])
    {
        /** @var AlunosRepository $alunosRepo */
        $alunosRepo = App::make(AlunosRepository::class);
        $theme = $this->fakeAlunosData($alunosFields);
        return $alunosRepo->create($theme);
    }

    /**
     * Get fake instance of Alunos
     *
     * @param array $alunosFields
     * @return Alunos
     */
    public function fakeAlunos($alunosFields = [])
    {
        return new Alunos($this->fakeAlunosData($alunosFields));
    }

    /**
     * Get fake data of Alunos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAlunosData($alunosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pessoa_id' => $fake->randomDigitNotNull,
            'matricula' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $alunosFields);
    }
}
