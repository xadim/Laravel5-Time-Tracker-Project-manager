@extends('app')

@section('content')

			      	
<div class="row">
	<div class="col-md-12">
			      
		<span class="h4">Types <a href="{{ url('types/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>

		<div class="pull-right">
			<a href="{{ url('types') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>


		<div class="spacerSmall"></div>

			      <!-- Table -->
			      <table class="table">
			        <thead class="bghead">
			          <tr>
			            <th>Title</th>
			            <th class="text-center">Actions</th>
			          </tr>
			        </thead>
			        <tbody>

			        	@foreach ($types as $type)
			        	
					          <tr class="project-table">
					            
					            <td>{!! $type->title !!}</td>
					            <td class="text-center">
					            	<a href="{{ url('types/' .$type->id. '/edit') }}">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
									|
									<a href="javascript:deleteType('{{ $type->id }}');">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
								</td>
					            
					          </tr>
				        
			         @endforeach
			         @if ($types->render())
				        <tr class="project-table">
				         	<td colspan="7">
						         <?php echo $types->render(); ?>	
						    </td>
						</tr>
					@endif
			        </tbody>
			      </table>
	</div>			    
</div>
@endsection
