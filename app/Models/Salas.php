<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Salas
 * @package App\Models
 * @version November 4, 2018, 10:08 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection notaFrequencia
 * @property \Illuminate\Database\Eloquent\Collection turmaRecurso
 * @property \Illuminate\Database\Eloquent\Collection turmas
 * @property integer numero
 * @property integer capacidade
 * @property string setor
 * @property integer andar
 * @property integer corredor
 */
class Salas extends Model
{
    use SoftDeletes;

    public $table = 'salas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'numero',
        'capacidade',
        'setor',
        'andar',
        'corredor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numero' => 'integer',
        'capacidade' => 'integer',
        'setor' => 'string',
        'andar' => 'integer',
        'corredor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
