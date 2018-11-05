<?php

namespace App\Repositories;

use App\Models\MyUsers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MyUsersRepository
 * @package App\Repositories
 * @version October 13, 2018, 10:53 pm UTC
 *
 * @method MyUsers findWithoutFail($id, $columns = ['*'])
 * @method MyUsers find($id, $columns = ['*'])
 * @method MyUsers first($columns = ['*'])
*/
class MyUsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MyUsers::class;
    }
}
