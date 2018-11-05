<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cursos
 * @package App\Models
 * @version October 31, 2018, 6:56 pm UTC
 *
 * @property \App\Models\Coordenadore coordenadore
 * @property \App\Models\Periodo periodo
 * @property string nome
 * @property integer periodo_id
 * @property integer coordenador_id
 * @property string descricao
 * @property integer cargahoraria
 */
class Cursos extends Model
{
    use SoftDeletes;

    public $table = 'cursos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $appends = ['label_periodo'];
    
   
    
    


    public $fillable = [
        'nome',
        'periodo_id',
        'coordenador_id',
        'descricao',
        'cargahoraria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'periodo_id' => 'integer',
        'coordenador_id' => 'integer',
        'descricao' => 'string',
        'cargahoraria' => 'integer'
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
    public function coordenador()
    {
        return $this->belongsTo(\App\Models\Coordenadores::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodos::class);
    }
    
    public function getNomeCoordenadorAttribute(){
        return "{$this->coordenador->pessoa->nome}";
    }
    
    public function getLabelPeriodoAttribute(){
        return "{$this->periodo->label}";
    }
    
    public function professores()
    {
        return $this->belongsToMany(\App\Models\Professores::class,'curso_professor','curso_id','professor_id');
    }
    
}
