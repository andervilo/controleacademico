<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TurmaSala
 * @package App\Models
 * @version November 4, 2018, 10:23 pm UTC
 *
 * @property \App\Models\Turma turma
 * @property \App\Models\Sala sala
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection notaFrequencia
 * @property \Illuminate\Database\Eloquent\Collection turmaRecurso
 * @property \Illuminate\Database\Eloquent\Collection turmas
 * @property integer turma_id
 * @property integer sala_id
 * @property integer dia_semana
 * @property time hora_inicio
 * @property time hora_fim
 */
class TurmaSala extends Model
{
    use SoftDeletes;

    public $table = 'turma_sala';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'turma_id',
        'sala_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'turma_id' => 'integer',
        'sala_id' => 'integer',
        'dia_semana' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function turma()
    {
        return $this->belongsTo(\App\Models\Turmas::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function minhasala()
    {
        return $this->belongsTo(\App\Models\Salas::class,'sala_id');
    }
}
