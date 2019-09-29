<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    function empresa() {
        return $this->belongsTo('App\Empresa');
    }
}
