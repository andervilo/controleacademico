<?php

namespace App\Repositories;

use App\Models\Teste;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TesteRepository
 * @package App\Repositories
 * @version October 27, 2018, 4:43 am UTC
 *
 * @method Teste findWithoutFail($id, $columns = ['*'])
 * @method Teste find($id, $columns = ['*'])
 * @method Teste first($columns = ['*'])
*/
class TesteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'teste1',
        'teste2'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Teste::class;
    }
}
