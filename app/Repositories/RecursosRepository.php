<?php

namespace App\Repositories;

use App\Models\Recursos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RecursosRepository
 * @package App\Repositories
 * @version November 4, 2018, 10:09 pm UTC
 *
 * @method Recursos findWithoutFail($id, $columns = ['*'])
 * @method Recursos find($id, $columns = ['*'])
 * @method Recursos first($columns = ['*'])
*/
class RecursosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao',
        'id_patrimonial',
        'data_aquisicao',
        'valor_aquisicao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Recursos::class;
    }
}
