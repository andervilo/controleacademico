<?php

namespace App\Repositories;

use App\Models\Turmas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TurmasRepository
 * @package App\Repositories
 * @version November 4, 2018, 10:06 pm UTC
 *
 * @method Turmas findWithoutFail($id, $columns = ['*'])
 * @method Turmas find($id, $columns = ['*'])
 * @method Turmas first($columns = ['*'])
*/
class TurmasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'curso_id',
        'professor_id',
        'identificador'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Turmas::class;
    }
}
