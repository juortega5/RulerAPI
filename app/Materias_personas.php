<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materias;
use App\Personas;

class Materias_personas extends Model
{
    public function personas()
    {
    	return $this->belongsTo('App\Personas','id');
    }

    public function materias()
    {
    	return $this->belongsTo('App\Materias','id');
    }

    public  function consultarMaterias($id)
	{
		$materias = Materias::join('materias_personas','materias_personas.id_materia','=','materias.id')
								->select('materias_personas.id','materias.nombre')
								->where('materias_personas.id_persona', $id)->get();
        $select = [];
        foreach($materias as $materias)
        {
            $select[$materias->id] = $materias->nombre;
        }
        return $select;
	}

    public  function consultarMateriaDatos($id)
    {
        $materias = Materias::join('materias_personas','materias_personas.id_materia','=','materias.id')
                                ->select('materias.id','materias.nombre')
                                ->where('materias_personas.id_persona', $id)->get();
        return $materias;
    }
}
