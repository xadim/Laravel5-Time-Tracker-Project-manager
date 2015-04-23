@extends('app')

@section('content')

<div id="timing">
	<div style="" class="col-md-12">
						
		<a href="{{ url('phases/' .$phase->id. '/edit') }}">
			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		</a>
		
		<div class="pull-right">
			<a href="{{ url('phases') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>

			<hr>
	</div>


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				
				@if ($phase->description)

					<ol class="breadcrumb">
					  <li><a href="{{ url('searchPhase/'.$phase->user_id) }}">{!! clientName(clientIdentification($phase->project_id)) !!}</a></li>
					  <li><a href="{{ url('searchPhase/'.$phase->project_id) }}">{!! projectTitle($phase->project_id) !!}</a></li>
					  <li class="active">{{ $phase->description }}</li>
					</ol>

					<h1>{{ $phase->description }}</h1>

					<small>
						<span class="glyphicon glyphicon-calendar blue" aria-hidden="true"></span> {{ $phase->created_at->diffForHumans() }}
					</small>

					<div class="tags"><a class="project-tag" href="{{ url('searchPhase/'.$phase->type_id) }}">{!! typeTitle($phase->type_id) !!}</a></div>
				@endif
			</div>	
		</div>
	</div>
</div>
@endsection
