<?php

use Faker\Factory as Faker;
use App\Models\Coordenador;
use App\Repositories\CoordenadorRepository;

trait MakeCoordenadorTrait
{
    /**
     * Create fake instance of Coordenador and save it in database
     *
     * @param array $coordenadorFields
     * @return Coordenador
     */
    public function makeCoordenador($coordenadorFields = [])
    {
        /** @var CoordenadorRepository $coordenadorRepo */
        $coordenadorRepo = App::make(CoordenadorRepository::class);
        $theme = $this->fakeCoordenadorData($coordenadorFields);
        return $coordenadorRepo->create($theme);
    }

    /**
     * Get fake instance of Coordenador
     *
     * @param array $coordenadorFields
     * @return Coordenador
     */
    public function fakeCoordenador($coordenadorFields = [])
    {
        return new Coordenador($this->fakeCoordenadorData($coordenadorFields));
    }

    /**
     * Get fake data of Coordenador
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCoordenadorData($coordenadorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_funcional' => $fake->word,
            'pessoa_id' => $fake->randomDigitNotNull,
            'salario' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $coordenadorFields);
    }
}
