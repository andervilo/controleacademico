<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Pessoas
 * @package App\Models
 * @version October 24, 2018, 11:50 pm UTC
 *
 * @property string nome
 * @property string cpf
 * @property string rg
 * @property string endereco
 * @property integer numero
 * @property string bairro
 * @property string cidade
 * @property string estado
 * @property string cep
 * @property string telefone
 * @property string celular
 * @property string email
 * @property date dt_nasc
 */
class Pessoas extends Model
{
    use SoftDeletes;

    public $table = 'pessoas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'cpf',
        'rg',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'celular',
        'email',
        'dt_nasc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'cpf' => 'string',
        'rg' => 'string',
        'endereco' => 'string',
        'numero' => 'integer',
        'bairro' => 'string',
        'cidade' => 'string',
        'estado' => 'string',
        'cep' => 'string',
        'telefone' => 'string',
        'celular' => 'string',
        'email' => 'string',
        'dt_nasc' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'endereco' => 'required',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
        'dt_nasc' => 'required'
    ];

//    public function getDtNascAttribute($value)
//    {
//        return Carbon::parse($value)->format('d/m/Y');
//    }
//    
//    public function formDtNascAttribute($value)
//    {
//        return Carbon::parse($value)->format('Y-m-d');
//    }
}
