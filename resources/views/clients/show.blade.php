@extends('app')

@section('content')

<div id="timing">
<div style="" class="col-md-12">
					
	<a href="{{ url('clients/' .$client->id. '/edit') }}">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</a>
	
	<div class="pull-right">
		<a href="{{ url('clients') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
	</div>

		<hr>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			@if ($client->name)

				<h1>{{ $client->name }}</h1>

			@endif


			<table class="table">
		        <thead class="bghead">
		          <tr>
		            <th>name</th>
		            <th>Adress</th>
		            <th>Email</th>
		            <th>Phone</th>
		            <th class="text-center">Actions</th>
		          </tr>
		        </thead>
		        <tbody>
		        	
				          <tr class="project-table">
				            
				            <td>{!! $client->person !!}</td>
				            <td>{!! $client->address !!}, {!! $client->city !!} {!! $client->state !!} {!! $client->postal !!}</td>
				            <td>{!! $client->email !!}</td>
				            <td>{!! $client->phone1 !!}</td>
				            <td class="text-center">
				            	<a href="{{ url('clients/' .$client->id. '/edit') }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
								|
								<a href="javascript:deleteClient('{{ $client->id }}');">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
							</td>
				            
				          </tr>
			        
		        </tbody>
		      </table>

		</div>
	</div>
</div>
@endsection
