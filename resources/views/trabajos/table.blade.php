@extends('personas.index')

@section('respuestas')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card text-white" style="background-color:#204051" >
			<div class="card-body">
				<form method="get" action="/api/trabajos/1/edit">
					<div class="form-group">
						<label for="unidad">Curso</label>
						<select name="curso"  class="form-control" id="curso" aria-describedby="cursoHelp">
							<option value="selected">Seleccione un curso</option>
							@foreach($cursos as $cursos)
							<option value="{{ $cursos }}">{{ $cursos }}</option>
							@endforeach
						</select>
						<small id="cursoHelp" class="form-text text-muted">Seleccione el curso para ver actividades subidas.</small>
					</div>
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary">Buscar</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection