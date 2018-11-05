<?php

use Faker\Factory as Faker;
use App\Models\Escolas;
use App\Repositories\EscolasRepository;

trait MakeEscolasTrait
{
    /**
     * Create fake instance of Escolas and save it in database
     *
     * @param array $escolasFields
     * @return Escolas
     */
    public function makeEscolas($escolasFields = [])
    {
        /** @var EscolasRepository $escolasRepo */
        $escolasRepo = App::make(EscolasRepository::class);
        $theme = $this->fakeEscolasData($escolasFields);
        return $escolasRepo->create($theme);
    }

    /**
     * Get fake instance of Escolas
     *
     * @param array $escolasFields
     * @return Escolas
     */
    public function fakeEscolas($escolasFields = [])
    {
        return new Escolas($this->fakeEscolasData($escolasFields));
    }

    /**
     * Get fake data of Escolas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEscolasData($escolasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'endereco' => $fake->word,
            'numero' => $fake->randomDigitNotNull,
            'bairro' => $fake->word,
            'cidade' => $fake->word,
            'estado' => $fake->word,
            'cep' => $fake->word,
            'diretor_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $escolasFields);
    }
}
