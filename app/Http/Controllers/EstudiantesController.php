<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos_personas;
use App\Trabajos;
use App\Materias_personas;
use App\Notas;


class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCursosPersonas = new Cursos_personas();
        $curso = $objCursosPersonas->buscarCurso(session('id'));
        $trabajos = Trabajos::buscarTrabajosEstudiantes($curso[0]->id_curso);
        return view('estudiantes.subTable',compact('trabajos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objMateriasPersonas = new Materias_personas();
        $materias = $objMateriasPersonas->consultarMateriaDatos($id);
        $notas = new Notas();
        return view('estudiantes.notas',compact('materias','notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
