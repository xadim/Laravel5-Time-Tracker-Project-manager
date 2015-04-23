@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit phase/ {{ $phase->description }}</div>
				<div class="panel-body">

					{!! Form::model($phase, ['route' => ['phases.update', $phase->id], 'method' => 'PATCH']) !!}
					
						@include ('phases.form')

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
