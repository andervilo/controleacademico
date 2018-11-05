<?php

namespace App\Repositories;

use App\Models\TurmaRecurso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TurmaRecursoRepository
 * @package App\Repositories
 * @version November 4, 2018, 10:13 pm UTC
 *
 * @method TurmaRecurso findWithoutFail($id, $columns = ['*'])
 * @method TurmaRecurso find($id, $columns = ['*'])
 * @method TurmaRecurso first($columns = ['*'])
*/
class TurmaRecursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'recurso_id',
        'turma_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TurmaRecurso::class;
    }
}
