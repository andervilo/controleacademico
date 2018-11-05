<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Escolas
 * @package App\Models
 * @version October 24, 2018, 11:40 pm UTC
 *
 * @property string nome
 * @property string endereco
 * @property integer numero
 * @property string bairro
 * @property string cidade
 * @property string estado
 * @property string cep
 * @property integer diretor_id
 */
class Escolas extends Model
{
    use SoftDeletes;

    public $table = 'escolas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'diretor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'endereco' => 'string',
        'numero' => 'integer',
        'bairro' => 'string',
        'cidade' => 'string',
        'estado' => 'string',
        'cep' => 'string',
        'diretor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'endereco' => 'required',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
        'diretor_id' => 'required'
    ];
    
    public function diretor(){
        return $this->belongsTo(Diretores::class);
    }

    
}
