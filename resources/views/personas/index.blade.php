@extends('layouts.app')

@section('title','Bienvenido')

@section('content')
@include('layouts.sidebar')
<div class="row">
	<div class="col-md-3">
		<a href="/api/trabajos/create" type="button" class="btn btn-secondary btn-lg btn-block">Cargar actividades</a>
		<a href="/api/notas" type="button" class="btn btn-secondary btn-lg btn-block">Calificar actividades</a>
		<a href="/api/trabajos" type="button" class="btn btn-secondary btn-lg btn-block">Ver actividades cargadas</a>
		<a href="#" type="button" class="btn btn-secondary btn-lg btn-block">Salir</a>
	</div>
	<div class="col-md-8 text-white">
		@yield('respuestas')
	</div>
</div>
@endsection