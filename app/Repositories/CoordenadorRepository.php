<?php

namespace App\Repositories;

use App\Models\Coordenador;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CoordenadorRepository
 * @package App\Repositories
 * @version October 27, 2018, 4:02 am UTC
 *
 * @method Coordenador findWithoutFail($id, $columns = ['*'])
 * @method Coordenador find($id, $columns = ['*'])
 * @method Coordenador first($columns = ['*'])
*/
class CoordenadorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_funcional',
        'salario'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Coordenador::class;
    }
}
