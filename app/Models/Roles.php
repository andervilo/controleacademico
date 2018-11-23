<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;

/**
 * Class Roles
 * @package App\Models
 * @version November 22, 2018, 4:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \App\Models\ModelHasRole modelHasRole
 * @property \Illuminate\Database\Eloquent\Collection notaFrequencia
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection turmaRecurso
 * @property \Illuminate\Database\Eloquent\Collection turmaSala
 * @property \Illuminate\Database\Eloquent\Collection turmas
 * @property string name
 * @property string guard_name
 */
class Roles extends Role
{

}
