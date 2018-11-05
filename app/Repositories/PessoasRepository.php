<?php

namespace App\Repositories;

use App\Models\Pessoas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PessoasRepository
 * @package App\Repositories
 * @version October 24, 2018, 11:50 pm UTC
 *
 * @method Pessoas findWithoutFail($id, $columns = ['*'])
 * @method Pessoas find($id, $columns = ['*'])
 * @method Pessoas first($columns = ['*'])
*/
class PessoasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'cpf',
        'rg',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'celular',
        'email',
        'dt_nasc'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pessoas::class;
    }
}
