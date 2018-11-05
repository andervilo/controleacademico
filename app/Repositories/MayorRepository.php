<?php

namespace App\Repositories;

use App\Models\Mayor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MayorRepository
 * @package App\Repositories
 * @version October 14, 2018, 2:14 am UTC
 *
 * @method Mayor findWithoutFail($id, $columns = ['*'])
 * @method Mayor find($id, $columns = ['*'])
 * @method Mayor first($columns = ['*'])
*/
class MayorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'salario',
        'pessoa_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Mayor::class;
    }
}
