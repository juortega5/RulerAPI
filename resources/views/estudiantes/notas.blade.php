@extends('personas.index')

@section('respuestas')
<table class="table table-dark table-hover table-bordered table-sm">
	<thead>
		<tr align="center">
			<th colspan="4">Listado de Materias 
				<a  href="/api/estudiantes" type="button" class="btn btn-success btn-sm">
				  Volver
				</a>
			</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<div id="accordion">
  @foreach($materias as $materias)
  <div class="card bg-dark" >
    <div class="card-header" id="">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$materias->nombre}}" aria-expanded="true" aria-controls="">
          {{ $materias->nombre }}
        </button>
      </h5>
    </div>
    <div id="{{$materias->nombre}}" class="collapse" aria-labelledby="" data-parent="#accordion">
      <div class="card-body">
      	@if(! $notas->consultarNotas(session('id'),$materias->id)->isEmpty())
      	@foreach($notas = $notas->consultarNotas(session('id'),$materias->id)  as $notas)
			Calificación {{ $notas->descripcion }}:
			@if($notas->archivoE<>"No aplica")
			<span class="badge badge-secondary">{{ $notas->nota }}</span>
			<hr>			
			@endif
		@endforeach
		@endif
      </div>
    </div>
  </div>
  <hr>
  @endforeach
</div>
@endsection