<?php

namespace App\Repositories;

use App\Models\Escolas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EscolasRepository
 * @package App\Repositories
 * @version October 24, 2018, 11:40 pm UTC
 *
 * @method Escolas findWithoutFail($id, $columns = ['*'])
 * @method Escolas find($id, $columns = ['*'])
 * @method Escolas first($columns = ['*'])
*/
class EscolasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Escolas::class;
    }
}
