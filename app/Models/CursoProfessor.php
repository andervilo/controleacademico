<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CursoProfessor
 * @package App\Models
 * @version November 1, 2018, 1:14 pm UTC
 *
 * @property \App\Models\Curso curso
 * @property \App\Models\Professore professore
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property integer curso_id
 * @property integer professor_id
 */
class CursoProfessor extends Model
{
    use SoftDeletes;

    public $table = 'curso_professor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'curso_id',
        'professor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'curso_id' => 'integer',
        'professor_id' => 'integer'
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
    public function cursos()
    {
        return $this->belongsTo(\App\Models\Cursos::class,'curso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function professores()
    {
        return $this->belongsTo(\App\Models\Professores::class,'professor_id');
    }
}
