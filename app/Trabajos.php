<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajos extends Model
{
    public static function buscarIdTrabajos($idCurso,$idMateria)
    {
    	$trabajos = Trabajos::select('id')
                            ->where('id_curso','=',$idCurso,'AND')
                            ->where('id_materia','=',$idMateria,'AND')
                            ->where('id_persona','=',session('id'))->get();
        return $trabajos;
    }
    
    public static function buscarTrabajos($id)
    {
    	$trabajos = Trabajos::join('materias','trabajos.id_materia','=','materias.id')
    						->select('trabajos.archivo','trabajos.descripcion','trabajos.video','materias.nombre')
                            ->where('trabajos.id_curso','=',$id,'AND')
                            ->where('trabajos.id_persona','=',session('id'))->get();
        return $trabajos;
    }

    public static function buscarTrabajosEstudiantes($id)
    {
        $trabajos = Trabajos::join('materias','trabajos.id_materia','=','materias.id')
                            ->join('notas','notas.id_trabajo','=','trabajos.id')
                            ->select('trabajos.id','trabajos.archivo','trabajos.descripcion','trabajos.video','materias.nombre')
                            ->where('trabajos.id_curso','=',$id,'AND')
                            ->where('notas.id_persona','=',session('id'),'AND')
                            ->where('notas.archivoE','=','No aplica')
                            ->get();
        return $trabajos;
    }
}
