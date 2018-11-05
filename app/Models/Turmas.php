<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Turmas
 * @package App\Models
 * @version November 4, 2018, 10:06 pm UTC
 *
 * @property \App\Models\Curso curso
 * @property \App\Models\Professore professore
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection NotaFrequencium
 * @property \Illuminate\Database\Eloquent\Collection TurmaRecurso
 * @property integer curso_id
 * @property integer professor_id
 * @property string identificador
 */
class Turmas extends Model
{
    use SoftDeletes;

    public $table = 'turmas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $appends = ['sala_id','sala_numero'];

    public $fillable = [
        'curso_id',
        'professor_id',
        'identificador'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'curso_id' => 'integer',
        'professor_id' => 'integer',
        'identificador' => 'string'
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
    public function curso()
    {
        return $this->belongsTo(\App\Models\Cursos::class,'curso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function professor()
    {
        return $this->belongsTo(\App\Models\Professores::class,'professor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function notaFrequencia()
    {
        return $this->hasMany(\App\Models\NotaFrequencium::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function turmaRecursos()
    {
        return $this->hasMany(\App\Models\TurmaRecurso::class);
    }
    
    public function sala()
    {
        return $this->hasOne(\App\Models\TurmaSala::class,'turma_id');
    }
    
    public function getSalaIdAttribute() {
        return "{$this->sala->sala_id}";
    }
    
    public function getSalaNumeroAttribute() {
        return "{$this->sala->minhasala->numero}";
    }
}
