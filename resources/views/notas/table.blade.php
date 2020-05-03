@extends('personas.index')

@section('respuestas')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card text-white" style="background-color:#204051" >
			<div class="card-body">
				<form method="get" action="/api/notas/0">
					<div class="form-group">
						<label for="unidad">Curso</label>
						<select required name="curso"  class="form-control" id="curso" aria-describedby="cursoHelp">
							<option value="">Seleccione un curso</option>
							@foreach($cursos as $cursos)
							<option value="{{ $cursos }}">{{ $cursos }}</option>
							@endforeach
						</select>
						<small id="cursoHelp" class="form-text text-muted">Seleccione el curso para ver actividades subidas.</small>
					</div>
					<div class="form-group">
						<label for="materia">Materia</label>
						<select required name="materia"  class="form-control" id="materia" aria-describedby="materiaHelp">
							<option value="">Seleccione una materia</option>
							@foreach($materias as $materias)
							<option value="{{ $materias }}">{{ $materias }}</option>
							@endforeach
						</select>
						<small id="materiaHelp" class="form-text text-muted">Seleccione la materia a la cual desea cargar una actividad.</small>
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