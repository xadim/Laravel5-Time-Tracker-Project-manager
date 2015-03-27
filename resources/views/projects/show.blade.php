@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $project->title }} project
					
					<a href="{{ url('projects/' .$project->slug. '/edit') }}">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					|
					
					{!! link_to_route('projects.index', 'Go Back Home') !!}

					<div class="pull-right">{!! delete_form(['projects.destroy', $project->slug]) !!}</div>

				</div>
				<div class="panel-body">
					@if ($project->title)

						<h1><em>{{ $project->title }}</em></h1>

						<p>Started: {{ $project->created_at->diffForHumans() }}</p>
					
						<article class="description">
							{!! nl2br($project->desc) !!}
						</article>
					@endif


					<hr>


					<div class="tags">
						
					
						@if ($project->tags)
							
							<?php $tag_array = explodeString($project->tags);?>

							@foreach($tag_array as $tag) 
								<a class="project-tag" href="{{ url('search/'.$tag) }}">{{ $tag }}</a>
							@endforeach
						
						@endif

						<div class="pull-right">

							@if( $project->authorized_users )
								<?php $tag_users = explodeString($project->authorized_users);?>
								@foreach($tag_users as $user) 
									<a class="project-users" href="{{ url('search/'.$user) }}">{{ $user }}</a>
								@endforeach
							@endif
						</div>
					</div>

				</div>
			</div>
			<hr/>
			<section id="comments">

				@foreach(($comments = retrieveComments($project->id)) as $comment)
					<div class="comment">
						<p> {{ $comment->name}} says ...</p>
						<blockquote>
							contributed {{ $comment->created_at->diffForHumans() }} <br>
							{{ $comment->content }}
						</blockquote>
					</div>
				@endforeach
			</section>
			<section>
				<h3>Contribute to the project</h3>

				{!! Form::open(['route' => ['comments.update', $project->id], 'method' => 'PATCH']) !!}

					<div class="form-group">
						<input name="name" class="form-control" type="text" placeholder="Your name here">
					</div>
					<div class="form-group">
						<textarea name="content" class="form-control" placeholder="Your name here"></textarea>
					</div>
					<input type="submit" class="btn btn-success">
				{!! Form::close() !!}
			</section>
		</div>
	</div>
</div>
@endsection
