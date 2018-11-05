<?php

use Faker\Factory as Faker;
use App\Models\Teste;
use App\Repositories\TesteRepository;

trait MakeTesteTrait
{
    /**
     * Create fake instance of Teste and save it in database
     *
     * @param array $testeFields
     * @return Teste
     */
    public function makeTeste($testeFields = [])
    {
        /** @var TesteRepository $testeRepo */
        $testeRepo = App::make(TesteRepository::class);
        $theme = $this->fakeTesteData($testeFields);
        return $testeRepo->create($theme);
    }

    /**
     * Get fake instance of Teste
     *
     * @param array $testeFields
     * @return Teste
     */
    public function fakeTeste($testeFields = [])
    {
        return new Teste($this->fakeTesteData($testeFields));
    }

    /**
     * Get fake data of Teste
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTesteData($testeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'teste1' => $fake->word,
            'teste2' => $fake->word
        ], $testeFields);
    }
}
