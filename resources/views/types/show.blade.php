@extends('app')

@section('content')

<div id="timing">
<div style="" class="col-md-12">
					
	<a href="{{ url('types/' .$type->id. '/edit') }}">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</a>
	
	<div class="pull-right">
		<a href="{{ url('types') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
	</div>

		<hr>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			@if ($type->name)

				<h1>{{ $type->name }}</h1>

			@endif


			<table class="table">
		        <thead class="bghead">
		          <tr>
		            <th>Title</th>
		            <th class="text-center">Actions</th>
		          </tr>
		        </thead>
		        <tbody>
		        	
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
			        
		        </tbody>
		      </table>

		</div>
	</div>
</div>
@endsection
