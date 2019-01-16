<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['nombre', 'email', 'sexo', 'ocupacion_id'];
    
}
