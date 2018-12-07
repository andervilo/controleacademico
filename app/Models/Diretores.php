<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\PessoaModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Diretores
 * @package App\Models
 * @version October 25, 2018, 12:47 am UTC
 *
 * @property integer id_funcional
 * @property double salario
 */
class Diretores extends Model
{
    use SoftDeletes;
    use PessoaModel;

    public $table = 'diretores';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_funcional',
        'pessoa_id',
        'salario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_funcional' => 'integer',
        'pessoa_id' => 'integer',
        'salario' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_funcional' => 'required',
        'salario' => 'required'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoas::class,'pessoa_id');
    }


}
