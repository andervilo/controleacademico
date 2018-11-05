<?php

use Faker\Factory as Faker;
use App\Models\Diretores;
use App\Repositories\DiretoresRepository;

trait MakeDiretoresTrait
{
    /**
     * Create fake instance of Diretores and save it in database
     *
     * @param array $diretoresFields
     * @return Diretores
     */
    public function makeDiretores($diretoresFields = [])
    {
        /** @var DiretoresRepository $diretoresRepo */
        $diretoresRepo = App::make(DiretoresRepository::class);
        $theme = $this->fakeDiretoresData($diretoresFields);
        return $diretoresRepo->create($theme);
    }

    /**
     * Get fake instance of Diretores
     *
     * @param array $diretoresFields
     * @return Diretores
     */
    public function fakeDiretores($diretoresFields = [])
    {
        return new Diretores($this->fakeDiretoresData($diretoresFields));
    }

    /**
     * Get fake data of Diretores
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDiretoresData($diretoresFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_funcional' => $fake->randomDigitNotNull,
            'pessoa_id' => $fake->randomDigitNotNull,
            'salario' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $diretoresFields);
    }
}
