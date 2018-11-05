<?php

namespace App\Repositories;

use App\Models\Cursos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CursosRepository
 * @package App\Repositories
 * @version October 31, 2018, 6:56 pm UTC
 *
 * @method Cursos findWithoutFail($id, $columns = ['*'])
 * @method Cursos find($id, $columns = ['*'])
 * @method Cursos first($columns = ['*'])
*/
class CursosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'periodo_id',
        'coordenador_id',
        'descricao',
        'cargahoraria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cursos::class;
    }
}
