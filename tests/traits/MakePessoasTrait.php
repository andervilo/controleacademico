<?php

use Faker\Factory as Faker;
use App\Models\Pessoas;
use App\Repositories\PessoasRepository;

trait MakePessoasTrait
{
    /**
     * Create fake instance of Pessoas and save it in database
     *
     * @param array $pessoasFields
     * @return Pessoas
     */
    public function makePessoas($pessoasFields = [])
    {
        /** @var PessoasRepository $pessoasRepo */
        $pessoasRepo = App::make(PessoasRepository::class);
        $theme = $this->fakePessoasData($pessoasFields);
        return $pessoasRepo->create($theme);
    }

    /**
     * Get fake instance of Pessoas
     *
     * @param array $pessoasFields
     * @return Pessoas
     */
    public function fakePessoas($pessoasFields = [])
    {
        return new Pessoas($this->fakePessoasData($pessoasFields));
    }

    /**
     * Get fake data of Pessoas
     *
     * @param array $postFields
     * @return array
     */
    public function fakePessoasData($pessoasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'cpf' => $fake->word,
            'rg' => $fake->word,
            'endereco' => $fake->word,
            'numero' => $fake->randomDigitNotNull,
            'bairro' => $fake->word,
            'cidade' => $fake->word,
            'estado' => $fake->word,
            'cep' => $fake->word,
            'telefone' => $fake->word,
            'celular' => $fake->word,
            'email' => $fake->word,
            'dt_nasc' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pessoasFields);
    }
}
