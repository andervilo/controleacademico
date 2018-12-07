<?php

namespace App\Repositories;

use App\Models\Coordenadores;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\Repository\PessoaRepositoryTrait;

/**
 * Class CoordenadoresRepository
 * @package App\Repositories
 * @version October 27, 2018, 4:13 am UTC
 *
 * @method Coordenadores findWithoutFail($id, $columns = ['*'])
 * @method Coordenadores find($id, $columns = ['*'])
 * @method Coordenadores first($columns = ['*'])
*/
class CoordenadoresRepository extends BaseRepository
{
    use PessoaRepositoryTrait;
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
        return Coordenadores::class;
    }
}
