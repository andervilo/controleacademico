<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Teste
 * @package App\Models
 * @version October 27, 2018, 4:43 am UTC
 *
 * @property boolean teste1
 * @property boolean teste2
 */
class Teste extends Model
{
    use SoftDeletes;

    public $table = 'testes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'teste1',
        'teste2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'teste1' => 'boolean',
        'teste2' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
