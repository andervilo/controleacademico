<?php

namespace App\Traits\Repository;
trait PessoaRepositoryTrait
{
    public function wherePessoa($q=null){
        return $this->model->wherePessoa($q);
    }
}
