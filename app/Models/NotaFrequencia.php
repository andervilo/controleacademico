<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NotaFrequencia
 * @package App\Models
 * @version November 4, 2018, 10:12 pm UTC
 *
 * @property \App\Models\Aluno aluno
 * @property \App\Models\Turma turma
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection turmaRecurso
 * @property \Illuminate\Database\Eloquent\Collection turmas
 * @property integer aluno_id
 * @property integer frequencia
 * @property decimal nota
 * @property string situacao
 * @property integer turma_id
 */
class NotaFrequencia extends Model
{
    use SoftDeletes;

    public $table = 'nota_frequencia';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'aluno_id',
        'frequencia',
        'nota',
        'situacao',
        'turma_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'aluno_id' => 'integer',
        'frequencia' => 'integer',
        'situacao' => 'string',
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
    public function aluno()
    {
        return $this->belongsTo(\App\Models\Alunos::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function turma()
    {
        return $this->belongsTo(\App\Models\Turmas::class);
    }
}
