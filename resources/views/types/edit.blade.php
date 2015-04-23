@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit type/ {{ $type->name }}</div>
				<div class="panel-body">

					{!! Form::model($type, ['route' => ['types.update', $type->id], 'method' => 'PATCH']) !!}
					
						@include ('types.form')

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
