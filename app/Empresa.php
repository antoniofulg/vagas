<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    function contatos() {
        return $this->hasMany('App\Contato');
    }

    function enderecos() {
        return $this->hasMany('App\Endereco');
    }

    function vagas() {
        return $this->hasMany('App\Vaga');
    }
}
