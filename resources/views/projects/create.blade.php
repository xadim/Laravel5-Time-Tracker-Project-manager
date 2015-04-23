@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Add a New Project</div>
				<div class="panel-body">

					{!! Form::open(['route' => 'projects.store']) !!}

						@include ('projects.form')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
