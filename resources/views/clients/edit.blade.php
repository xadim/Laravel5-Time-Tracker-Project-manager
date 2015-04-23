@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit client/ {{ $client->name }}</div>
				<div class="panel-body">

					{!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PATCH']) !!}
					
						@include ('clients.form')

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
