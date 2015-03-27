@extends('app')

@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="bs-example" data-example-id="table-within-panel">
			    <div class="panel panel-default">
			      <!-- Default panel contents -->
			      <div class="panel-heading">
			      	<h3>
			      		Current projects 
			      		@if($word)
			      			/ result (s) find for <em class="project-users">
			      			@if (is_numeric($word))
			      				{{ retrieveProjectOwner($word) }}
			      			@else
			      				{{ $word }}
			      			@endif
			      		</em>
			      		@endif
			      	</h3>
			      </div>
			      <div class="panel-body">
			        <p>Hoon Designs Time Tracker / Project manager application.</p>
			      </div>

			      <!-- Table -->
			      <table class="table">
			        <thead>
			          <tr>
			            <th>Projects</th>
			            <th>Tags</th>
			            <th>Unit</th>
			            <th>Created By</th>
			            <th>Time Track</th>
			            <th>Status</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@foreach ($projects as $project)
				        	@if( ($project->user_id != 3) && ($project->user_id == Auth::user()->id))
					          <tr class="project-table">
					            <td>{!! link_to_route('projects.show', $project->title, [$project->slug]) !!}</td>
					            <td>{!! $project->tags !!}</td>
					            <td>{!! $project->unit !!}</td>
					            <td>{{ retrieveProjectOwner($project->user_id) }}</td>
					            <td>
					            <?php
						            $timeTracker = new timeTracker;
						            $designs = $timeTracker->designsTimeTracker($project->id);
						            $dev = $timeTracker->devTimeTracker($project->id);
						            $prod = $timeTracker->prodTimeTracker($project->id);

						            $result = finalTime($designs, $dev, $prod)
					            ?>
					            <td>
						            @if($result > 0 )
						             	{{ secondsToTime($result) }}
						            @else
						            	Task not started
						            @endif
					            </td>
					            <td>{{ progressStatus($project->status) }}</td>
					          </tr>
				         @elseif( Auth::user()->id == 3 )
					          <tr class="project-table">
					            <td>{!! link_to_route('projects.show', $project->title, [$project->slug]) !!}</td>
					            <td>{!! $project->tags !!}</td>
					            <td>{!! $project->unit !!}</td>
					            <td><a class="" href="{{ url('search/'.$project->user_id) }}">{{ retrieveProjectOwner($project->user_id) }}</a></td>
					            <?php
						            $timeTracker = new timeTracker;
						            $designs = $timeTracker->designsTimeTracker($project->id);
						            $dev = $timeTracker->devTimeTracker($project->id);
						            $prod = $timeTracker->prodTimeTracker($project->id);

						            $result = finalTime($designs, $dev, $prod)
					            ?>
					            <td>
						            @if($result > 0 )
						             	{{ secondsToTime($result) }}
						            @else
						            	Task not started
						            @endif
					            	
					            </td>
					            <td>{{ progressStatus($project->status) }}</td>
					          </tr>
				         @else
				         	0 project added yet!
				         @endif
			         @endforeach
			        </tbody>
			      </table>
			    </div>
			  </div>
		</div>
	</div>
</div>

@endsection
