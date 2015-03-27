@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit project/ {{ $project->title }}</div>
				<div class="panel-body">
					<h1><em>{{ $project->title }}</em></h1>

					{!! Form::model($project, ['route' => ['projects.update', $project->slug], 'method' => 'PATCH']) !!}
					
						@include ('projects.form')

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
