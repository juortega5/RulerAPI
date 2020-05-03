<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prm_cursos;
use App\Personas;

class Cursos_personas extends Model
{
    public function personas()
    {
    	return $this->belongsTo('App\Personas','id');
    }

    public function prmCursos()
    {
    	return $this->belongsTo('App\Prm_cursos','id');
    }

    public  function consultarCursos($id)
	{
		$cursos = prm_cursos::join('cursos_personas','cursos_personas.id_curso','=','prm_cursos.id')
								->select('cursos_personas.id','prm_cursos.curso')
								->where('cursos_personas.id_persona', $id)->get();
        $select = [];
        foreach($cursos as $cursos)
        {
            $select[$cursos->id] = $cursos->curso;
        }
        return $select;
	}

    public  function consultarAlumnos($curso,$materia)
    {
        $alumnos = personas::join('cursos_personas','cursos_personas.id_persona','=','personas.id')->
                            join('materias_personas','materias_personas.id_persona','=','personas.id')
                                ->select('personas.id','personas.nombre','personas.usuario')
                                ->where('cursos_personas.id_curso', $curso,'AND')
                                ->where('materias_personas.id_materia', $materia,'AND')
                                ->where('personas.id_tipo_usuario', '2')->get();
        return $alumnos;
    }

    public function buscarCurso($id)
    {
        $curso = cursos_personas::select('id_curso')->where('id_persona',$id)->get();
        return $curso;
    }

}
