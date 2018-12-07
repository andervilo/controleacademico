<?php

namespace App\Traits\Model;
//use App\Models\Professores;
trait PessoaModel
{
    public function scopeWherePessoa($query, $value=null){
        if($value != null || trim($value) != ""){
            return $query->whereHas('pessoa', function($query) use($value){
                $query->where('nome','LIKE',"%{$value}%")
                      ->orWhere('cpf','LIKE',"%{$value}%")
                      ->orWhere('rg','LIKE',"%{$value}%")
                      ->orWhere('email','LIKE',"%{$value}%")
                ;
            })->orWhere('id_funcional','LIKE',"%{$value}%");
        }
    }
}
