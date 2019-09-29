<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    function empresa() {
        return $this->belongsTo('App\Empresa');
    }
}
