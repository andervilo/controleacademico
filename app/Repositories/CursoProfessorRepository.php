<?php

namespace App\Repositories;

use App\Models\CursoProfessor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CursoProfessorRepository
 * @package App\Repositories
 * @version November 1, 2018, 1:14 pm UTC
 *
 * @method CursoProfessor findWithoutFail($id, $columns = ['*'])
 * @method CursoProfessor find($id, $columns = ['*'])
 * @method CursoProfessor first($columns = ['*'])
*/
class CursoProfessorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'curso_id',
        'professor_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CursoProfessor::class;
    }
}
