<?php

use Faker\Factory as Faker;
use App\Models\Rotas;
use App\Repositories\RotasRepository;

trait MakeRotasTrait
{
    /**
     * Create fake instance of Rotas and save it in database
     *
     * @param array $rotasFields
     * @return Rotas
     */
    public function makeRotas($rotasFields = [])
    {
        /** @var RotasRepository $rotasRepo */
        $rotasRepo = App::make(RotasRepository::class);
        $theme = $this->fakeRotasData($rotasFields);
        return $rotasRepo->create($theme);
    }

    /**
     * Get fake instance of Rotas
     *
     * @param array $rotasFields
     * @return Rotas
     */
    public function fakeRotas($rotasFields = [])
    {
        return new Rotas($this->fakeRotasData($rotasFields));
    }

    /**
     * Get fake data of Rotas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRotasData($rotasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'uri' => $fake->word,
            'method' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $rotasFields);
    }
}
