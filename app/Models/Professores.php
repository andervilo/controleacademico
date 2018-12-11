<?php

namespace App\Models;

use Eloquent as Model;
use App\Traits\Model\PessoaModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Professores
 * @package App\Models
 * @version October 27, 2018, 4:16 am UTC
 *
 * @property integer id_funcional
 * @property integer pessoa_id
 * @property double salario
 */
class Professores extends Model
{
    use SoftDeletes;
    use PessoaModel;
    public $table = 'professores';


    protected $dates = ['deleted_at'];

    protected $appends = ['fullname'];

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



    public function cursos()
    {
        return $this->belongsToMany(\App\Models\Cursos::class);
    }

    public function getFullnameAttribute(){

        return "{$this->pessoa->nome}";
    }
}
