<?php

namespace App\Repositories;

use App\Models\Permissions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionsRepository
 * @package App\Repositories
 * @version November 22, 2018, 4:59 pm UTC
 *
 * @method Permissions findWithoutFail($id, $columns = ['*'])
 * @method Permissions find($id, $columns = ['*'])
 * @method Permissions first($columns = ['*'])
*/
class PermissionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Permissions::class;
    }
}
