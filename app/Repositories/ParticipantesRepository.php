<?php

namespace App\Repositories;

use App\Models\Participantes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParticipantesRepository
 * @package App\Repositories
 * @version October 23, 2018, 11:15 pm UTC
 *
 * @method Participantes findWithoutFail($id, $columns = ['*'])
 * @method Participantes find($id, $columns = ['*'])
 * @method Participantes first($columns = ['*'])
*/
class ParticipantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'filme_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Participantes::class;
    }
}
