<?php

namespace App\Repositories;

use App\Models\Filmes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FilmesRepository
 * @package App\Repositories
 * @version October 23, 2018, 2:55 pm UTC
 *
 * @method Filmes findWithoutFail($id, $columns = ['*'])
 * @method Filmes find($id, $columns = ['*'])
 * @method Filmes first($columns = ['*'])
*/
class FilmesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Filmes::class;
    }
}
