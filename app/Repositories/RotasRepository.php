<?php

namespace App\Repositories;

use App\Models\Rotas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RotasRepository
 * @package App\Repositories
 * @version November 24, 2018, 5:33 pm UTC
 *
 * @method Rotas findWithoutFail($id, $columns = ['*'])
 * @method Rotas find($id, $columns = ['*'])
 * @method Rotas first($columns = ['*'])
*/
class RotasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uri',
        'method'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rotas::class;
    }
}
