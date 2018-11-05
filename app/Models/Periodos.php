<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Periodos
 * @package App\Models
 * @version October 27, 2018, 4:33 am UTC
 *
 * @property \App\Models\Escola escola
 * @property integer escola_id
 * @property integer ano
 * @property boolean anual
 * @property boolean semestre1
 * @property boolean semestre2
 */
class Periodos extends Model
{
    use SoftDeletes;

    public $table = 'periodos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'escola_id',
        'ano',
        'anual',
        'semestre1',
        'semestre2'
    ];
    
    protected $appends = ['tipoperiodo'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'escola_id' => 'integer',
        'ano' => 'integer',
        'anual' => 'boolean',
        'semestre1' => 'boolean',
        'semestre2' => 'boolean'
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
    public function escola()
    {
        return $this->belongsTo(\App\Models\Escolas::class);
    }
    
    public function getLabelAttribute(){
        $tipoper = '';
        if($this->anual){
            $tipoper = "ANUAL";
        }elseif($this->semestre1){
            $tipoper = "1º SEMESTRE";
        }elseif($this->semestre2){
            $tipoper = "2º SEMESTRE";
        }
        
        return "{$this->escola->nome} [{$this->ano}:{$tipoper}]";
    }
    
    public function getTipoperiodoAttribute(){
        $tipoperiodo = '';
        if($this->anual == true){
            $tipoperiodo=1;            
        }elseif($this->semestre1 == true){
            $tipoperiodo=2;            
        }elseif($this->semestre2 == true){
            $tipoperiodo=3; 
        }
        
        return "{$tipoperiodo}";
    }
}
