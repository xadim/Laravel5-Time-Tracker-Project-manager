@extends('app')

@section('content')

			      	
<div class="row">
	<div class="col-md-8 col-md-offset-2">
			      
				<h4> Graphite Time Tracker Application Users <a href="{{ url('users/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h4>


			      <!-- Table -->
			      <table class="table">
			        <thead class="bghead">
			          <tr>
			            <th>name</th>
			            <th>Email</th>
			            <th class="text-center">Status</th>
			          </tr>
			        </thead>
			        <tbody>

			        	@foreach ($users as $user)
			        	
					          <tr class="project-table">
					            
					            <td>{!! $user->name !!}</td>
					            <td>{!! $user->email !!}</td>
					            <td class="text-center">
					            	<a href="{{ url('users/' .$user->id. '/edit') }}">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
									|
									<a href="javascript:deleteUser('{{ $user->id }}');">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
								</td>
					            
					          </tr>
				        
			         @endforeach
			        </tbody>
			      </table>
	</div>			    
</div>
@endsection
