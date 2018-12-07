<?php

namespace App\Repositories;

use App\Models\Diretores;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\Repository\PessoaRepositoryTrait;

/**
 * Class DiretoresRepository
 * @package App\Repositories
 * @version October 25, 2018, 12:47 am UTC
 *
 * @method Diretores findWithoutFail($id, $columns = ['*'])
 * @method Diretores find($id, $columns = ['*'])
 * @method Diretores first($columns = ['*'])
*/
class DiretoresRepository extends BaseRepository
{
    use PessoaRepositoryTrait;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_funcional'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Diretores::class;
    }
}
