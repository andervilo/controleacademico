<?php

use Faker\Factory as Faker;
use App\Models\Recursos;
use App\Repositories\RecursosRepository;

trait MakeRecursosTrait
{
    /**
     * Create fake instance of Recursos and save it in database
     *
     * @param array $recursosFields
     * @return Recursos
     */
    public function makeRecursos($recursosFields = [])
    {
        /** @var RecursosRepository $recursosRepo */
        $recursosRepo = App::make(RecursosRepository::class);
        $theme = $this->fakeRecursosData($recursosFields);
        return $recursosRepo->create($theme);
    }

    /**
     * Get fake instance of Recursos
     *
     * @param array $recursosFields
     * @return Recursos
     */
    public function fakeRecursos($recursosFields = [])
    {
        return new Recursos($this->fakeRecursosData($recursosFields));
    }

    /**
     * Get fake data of Recursos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRecursosData($recursosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'id_patrimonial' => $fake->randomDigitNotNull,
            'data_aquisicao' => $fake->word,
            'valor_aquisicao' => $fake->word
        ], $recursosFields);
    }
}
