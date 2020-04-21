<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    public function cursosPersonas()
	{
		return $this->hasMany('App\Cursos_personas');
	}
}
