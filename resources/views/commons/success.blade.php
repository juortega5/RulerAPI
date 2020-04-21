@extends('personas.index')

@section('respuestas')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ $estado }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	</div>
</div>
@endsection
