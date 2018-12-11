<?php

namespace App\Repositories;

use App\Models\Professores;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\Repository\PessoaRepositoryTrait;

/**
 * Class ProfessoresRepository
 * @package App\Repositories
 * @version October 27, 2018, 4:16 am UTC
 *
 * @method Professores findWithoutFail($id, $columns = ['*'])
 * @method Professores find($id, $columns = ['*'])
 * @method Professores first($columns = ['*'])
*/
class ProfessoresRepository extends BaseRepository
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
        return Professores::class;
    }


}
