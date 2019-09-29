<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    function empresa() {
        return $this->belongsTo('App\Empresa');
    }
}
