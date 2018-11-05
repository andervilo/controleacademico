<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alunos
 * @package App\Models
 * @version October 27, 2018, 4:19 am UTC
 *
 * @property integer pessoa_id
 * @property integer matricula
 */
class Alunos extends Model
{
    use SoftDeletes;

    public $table = 'alunos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'pessoa_id',
        'matricula'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pessoa_id' => 'integer',
        'matricula' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricula' => 'required'
    ];
    
    public function pessoa()
    {
        return $this->belongsTo(Pessoas::class,'pessoa_id');
    }

    
}
