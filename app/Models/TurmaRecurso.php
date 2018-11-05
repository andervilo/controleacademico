<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TurmaRecurso
 * @package App\Models
 * @version November 4, 2018, 10:13 pm UTC
 *
 * @property \App\Models\Recurso recurso
 * @property \App\Models\Turma turma
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection notaFrequencia
 * @property \Illuminate\Database\Eloquent\Collection turmas
 * @property integer recurso_id
 * @property integer turma_id
 */
class TurmaRecurso extends Model
{
    use SoftDeletes;

    public $table = 'turma_recurso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'recurso_id',
        'turma_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recurso_id' => 'integer',
        'turma_id' => 'integer'
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
    public function recurso()
    {
        return $this->belongsTo(\App\Models\Recursos::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function turma()
    {
        return $this->belongsTo(\App\Models\Turmas::class);
    }
}
