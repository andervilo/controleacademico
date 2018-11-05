<?php

namespace App\Repositories;

use App\Models\Actors;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActorsRepository
 * @package App\Repositories
 * @version October 23, 2018, 3:12 pm UTC
 *
 * @method Actors findWithoutFail($id, $columns = ['*'])
 * @method Actors find($id, $columns = ['*'])
 * @method Actors first($columns = ['*'])
*/
class ActorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'idade'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Actors::class;
    }
}
