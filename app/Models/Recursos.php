<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recursos
 * @package App\Models
 * @version November 4, 2018, 10:09 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection cursoProfessor
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection notaFrequencia
 * @property \Illuminate\Database\Eloquent\Collection TurmaRecurso
 * @property \Illuminate\Database\Eloquent\Collection turmas
 * @property string descricao
 * @property integer id_patrimonial
 * @property date data_aquisicao
 * @property decimal valor_aquisicao
 */
class Recursos extends Model
{
    use SoftDeletes;

    public $table = 'recursos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descricao',
        'id_patrimonial',
        'data_aquisicao',
        'valor_aquisicao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descricao' => 'string',
        'id_patrimonial' => 'integer',
        'data_aquisicao' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function turmaRecursos()
    {
        return $this->hasMany(\App\Models\TurmaRecurso::class);
    }
}
