<?php

use Faker\Factory as Faker;
use App\Models\Cursos;
use App\Repositories\CursosRepository;

trait MakeCursosTrait
{
    /**
     * Create fake instance of Cursos and save it in database
     *
     * @param array $cursosFields
     * @return Cursos
     */
    public function makeCursos($cursosFields = [])
    {
        /** @var CursosRepository $cursosRepo */
        $cursosRepo = App::make(CursosRepository::class);
        $theme = $this->fakeCursosData($cursosFields);
        return $cursosRepo->create($theme);
    }

    /**
     * Get fake instance of Cursos
     *
     * @param array $cursosFields
     * @return Cursos
     */
    public function fakeCursos($cursosFields = [])
    {
        return new Cursos($this->fakeCursosData($cursosFields));
    }

    /**
     * Get fake data of Cursos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCursosData($cursosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'periodo_id' => $fake->randomDigitNotNull,
            'coordenador_id' => $fake->randomDigitNotNull,
            'descricao' => $fake->text,
            'cargahoraria' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cursosFields);
    }
}
