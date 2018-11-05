<?php

namespace App\Repositories;

use App\Models\Pessoa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PessoaRepository
 * @package App\Repositories
 * @version October 13, 2018, 9:16 pm UTC
 *
 * @method Pessoa findWithoutFail($id, $columns = ['*'])
 * @method Pessoa find($id, $columns = ['*'])
 * @method Pessoa first($columns = ['*'])
*/
class PessoaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'data_nascimento',
        'rg',
        'cpf',
        'ender_logradouro',
        'ender_comlemento',
        'ender_bairro',
        'ender_cidade',
        'ender_estado',
        'ender_cep'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pessoa::class;
    }
}
