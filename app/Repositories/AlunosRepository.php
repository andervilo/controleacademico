<?php

namespace App\Repositories;

use App\Models\Alunos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlunosRepository
 * @package App\Repositories
 * @version October 27, 2018, 4:19 am UTC
 *
 * @method Alunos findWithoutFail($id, $columns = ['*'])
 * @method Alunos find($id, $columns = ['*'])
 * @method Alunos first($columns = ['*'])
*/
class AlunosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pessoa_id',
        'matricula'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alunos::class;
    }
}
