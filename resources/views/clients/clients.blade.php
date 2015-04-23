@extends('app')

@section('content')

			      	
<div class="row">
	<div class="col-md-12">
			      
		<span class="h4">Clients <a href="{{ url('clients/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
		

		<div class="pull-right">
			<a href="{{ url('clients') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>


		<div class="spacerSmall"></div>

			      <!-- Table -->
			      <table class="table">
			        <thead class="bghead">
			          <tr>
			          	<th class="th"></th>
			            <th>name</th>
			            <th>Contact</th>
			            <th>Email</th>
			            <th>Phone</th>
			            <th class="text-center">Actions</th>
			          </tr>
			        </thead>
			        <tbody>

			        	@foreach ($clients as $client)
			        	
					          <tr class="project-table trhover">
						        <td>
						            <a class="delete" href="javascript:deleteClient('{{ $client->id }}');">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
					            </td>
					            <td>{!! $client->name !!}</td>
					            <td>{!! $client->person !!}</td>
					            <td>{!! $client->email !!}</td>
					            <td>{!! $client->phone1 !!}</td>
					            <td class="text-center">
					            	<a href="{{ url('clients/' .$client->id. '/edit') }}">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
									<!---|
									<a href="javascript:deleteClient('{{ $client->id }}');">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
									-->
								</td>
					            
					          </tr>
				        
			         @endforeach
			        </tbody>
			      </table>
	</div>			    
</div>
@endsection
