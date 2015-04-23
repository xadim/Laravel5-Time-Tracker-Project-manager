@extends('app')

@section('content')

<div id="timing">
<div style="" class="col-md-12">
					
	<a href="{{ url('projects/' .$project->slug. '/edit') }}">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</a>
	
	<div class="pull-right">
			<a href="{{ url('projects') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>

		<hr>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			@if ($project->title)

				<h1>{{ $project->title }}</h1>

				<?php

					$timing = projectPhaseTracker($project->id);

					if ($timing != "Task not started") {
		            	$elapseTime = secondsToTimeSimple(toSeconds($timing));
		            }else{
		            	$elapseTime = "0 : 00 : 00 s";
		            }

				 ?>


				<small>
					<span class="glyphicon glyphicon-calendar blue" aria-hidden="true"></span> {{ $project->created_at->diffForHumans() }}
				</small>

				<small>
					<span class="glyphicon glyphicon-time blue" aria-hidden="true"></span>
					 @if($elapseTime != "0 : 00 : 00 s" )
		             	Elapsed Time:  {{ $elapseTime }}
		            @else
		            	Tasks not started
		            @endif
				</small>


				<article>
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

			<hr/>
			<section id="comments">

				@foreach(($comments = retrieveComments($project->id)) as $comment)
					<div class="comment">
						<p> {{ retrieveProjectOwner($comment->user_id)}} says ...</p>
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
						<input type="hidden" name="name" class="form-control" type="text" value="{{ Auth::user()->id }}">
					</div>
					<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
						<textarea name="content" class="form-control" placeholder="Your message here"></textarea>
						{!! $errors->first('content', '<span class="help-bloc">:message</span>') !!}
					</div>
					<input type="submit" class="btn btn-success" value="Submit">
				{!! Form::close() !!}
			</section>
		</div>
	</div>
</div>
@endsection
