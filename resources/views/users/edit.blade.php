@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit user/ {{ $user->name }}</div>
				<div class="panel-body">

					{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}
					
						@include ('users.form')

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
