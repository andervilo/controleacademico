<?php

use Faker\Factory as Faker;
use App\Models\NotaFrequencia;
use App\Repositories\NotaFrequenciaRepository;

trait MakeNotaFrequenciaTrait
{
    /**
     * Create fake instance of NotaFrequencia and save it in database
     *
     * @param array $notaFrequenciaFields
     * @return NotaFrequencia
     */
    public function makeNotaFrequencia($notaFrequenciaFields = [])
    {
        /** @var NotaFrequenciaRepository $notaFrequenciaRepo */
        $notaFrequenciaRepo = App::make(NotaFrequenciaRepository::class);
        $theme = $this->fakeNotaFrequenciaData($notaFrequenciaFields);
        return $notaFrequenciaRepo->create($theme);
    }

    /**
     * Get fake instance of NotaFrequencia
     *
     * @param array $notaFrequenciaFields
     * @return NotaFrequencia
     */
    public function fakeNotaFrequencia($notaFrequenciaFields = [])
    {
        return new NotaFrequencia($this->fakeNotaFrequenciaData($notaFrequenciaFields));
    }

    /**
     * Get fake data of NotaFrequencia
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNotaFrequenciaData($notaFrequenciaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'aluno_id' => $fake->randomDigitNotNull,
            'frequencia' => $fake->randomDigitNotNull,
            'nota' => $fake->word,
            'situacao' => $fake->word,
            'turma_id' => $fake->randomDigitNotNull
        ], $notaFrequenciaFields);
    }
}
