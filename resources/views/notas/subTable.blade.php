@extends('personas.index')

@section('respuestas')
<table class="table table-dark table-hover table-bordered table-sm">
	<thead>
		<tr align="center">
			<th colspan="4">Listado de Estudiantes 
				<a  href="/api/notas" type="button" class="btn btn-success btn-sm">
				  Volver
				</a>
			</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>
<div id="accordion">
  @foreach($estudiantes as $estudiantes)
  <div class="card bg-dark" >
    <div class="card-header" id="{{ $estudiantes->id }}">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$estudiantes->usuario}}" aria-expanded="true" aria-controls="">
          {{ $estudiantes->nombre }}
        </button>
      </h5>
    </div>
    <div id="{{$estudiantes->usuario}}" class="collapse" aria-labelledby="" data-parent="#accordion">
      <div class="card-body">
      	@if(! $notas->consultarNotas($estudiantes->id,$materia)->isEmpty())
      	@foreach($notas = $notas->consultarNotas($estudiantes->id,$materia)  as $notas)
			<form class="form-inline" method="POST" action="/api/notas/{{ $notas->id }}">
				@method('PUT')
				<div class="form-group mx-sm-3 mb-2">
					{{ $notas->descripcion }}:
				</div>
				@if($notas->archivoE<>"No aplica")
				<div class="form-group mb-2">
					<a target="blank" href="{{ '/tareas/'.$notas->archivoE }}">Archivo</a>
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<input readonly type="text" class="form-control" name="valor" value="{{ $notas->comentario }}">
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<input type="number" class="form-control" name="valor" value="{{ $notas->nota }}">
				</div>
				<div class="form-group mb-2">
					<button type="submit" class=" btn btn-primary">Calificar</button> 
				</div>
				@endif
			</form>
		@endforeach
		@endif
      </div>
    </div>
  </div>
  <hr>
  @endforeach
</div>
@endsection