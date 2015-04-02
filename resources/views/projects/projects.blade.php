@extends('app')

@section('content')


			      	
<div class="row">
	<div class="col-md-8 col-md-offset-2">
			      
				<h4>
			       Graphite Time Tracker for {{ Auth::user()->name }}		
			        
			        @if($word)
		      			/ result (s) find for keyword <em class="project-users">
		      			@if (is_numeric($word))
		      				{{ retrieveProjectOwner($word) }}
		      			@else
		      				{{ $word }}
		      			@endif
		      			</em>
		      		@endif
		      
			      </h4>


			      <!-- Table -->
			      <table class="table">
			        <thead class="bghead">
			          <tr>
			            <th>Projects</th>
			            <th>Unit</th>
			            <th>Created By</th>
			            <th>Time Track</th>
			            <th class="text-center">Status</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@foreach ($projects as $project)
			        	<?php
				            $timeTracker = new timeTracker;
				            $designs = $timeTracker->designsTimeTracker($project->id);
				            $dev = $timeTracker->devTimeTracker($project->id);
				            $prod = $timeTracker->prodTimeTracker($project->id);

				            $projectNotStarted = 'Project not started';

				            $projectFinished = 'Project finished';

				            $result = finalTime($designs, $dev, $prod);

				            $arr_users = explodeString($project->authorized_users);

			            ?>

				        	@if( ($project->user_id != 3) && ($project->user_id == Auth::user()->id OR in_array(Auth::user()->email, $arr_users) ))
					          <tr class="project-table">
					            <td>{!! link_to_route('projects.show', $project->title, [$project->slug]) !!}</td>
					            <td>{!! $project->unit !!}</td>
					            <td><a class="" href="{{ url('search/'.$project->user_id) }}">{{ retrieveProjectOwner($project->user_id) }}</a></td>
					            
					            <td>
						            @if($result > 0 )
						             	{{ secondsToTime($result) }}
						            @else
						            	Task not started
						            @endif
					            	
					            </td>
					            <td>
					            	@if( (projectStatus($project->id)['status_task_designs'] == 'end' && projectStatus($project->id)['status_task_prod'] == 'notStart' && projectStatus($project->id)['status_task_dev'] == 'notStart'))

					            	    {{ progressStatus($projectFinished) }}
					            	 
					            	@elseif($result > 0 )
						             	
						             	{{ progressStatus($result) }}
						            
						            @else
						            	
						            	{{ progressStatus($projectNotStarted) }}
						            
						            @endif
					            </td>
					          </tr>
				         @elseif( Auth::user()->id == 3 )
					          <tr class="project-table">
					            <td>{!! link_to_route('projects.show', $project->title, [$project->slug]) !!}</td>
					            <td>{!! $project->unit !!}</td>
					            <td><a class="" href="{{ url('search/'.$project->user_id) }}">{{ retrieveProjectOwner($project->user_id) }}</a></td>
					            
					            <td>
						            @if($result > 0 )
						             	{{ secondsToTime($result) }}
						            @else
						            	Task not started
						            @endif
					            	
					            </td>
					            <td class="text-center">
					            	@if((projectStatus($project->id)['status_task_designs'] == 'end' && projectStatus($project->id)['status_task_prod'] == 'end' && projectStatus($project->id)['status_task_dev'] == 'end') || (projectStatus($project->id)['status_task_designs'] == 'notStart' && projectStatus($project->id)['status_task_prod'] == 'end' && projectStatus($project->id)['status_task_dev'] == 'end')  || (projectStatus($project->id)['status_task_designs'] == 'end' && projectStatus($project->id)['status_task_prod'] == 'notStart' && projectStatus($project->id)['status_task_dev'] == 'end') || (projectStatus($project->id)['status_task_designs'] == 'end' && projectStatus($project->id)['status_task_prod'] == 'end' && projectStatus($project->id)['status_task_dev'] == 'notStart') || (projectStatus($project->id)['status_task_designs'] == 'end' && projectStatus($project->id)['status_task_prod'] == 'notStart' && projectStatus($project->id)['status_task_dev'] == 'notStart') || (projectStatus($project->id)['status_task_designs'] == 'notStart' && projectStatus($project->id)['status_task_prod'] == 'end' && projectStatus($project->id)['status_task_dev'] == 'notStart') || (projectStatus($project->id)['status_task_designs'] == 'notStart' && projectStatus($project->id)['status_task_prod'] == 'notStart' && projectStatus($project->id)['status_task_dev'] == 'end') )

					            	    {{ progressStatus($projectFinished) }}
					            	 
					            	@elseif($result > 0 )
						             	
						             	{{ progressStatus($result) }}
						            
						            @else
						            	
						            	{{ progressStatus($projectNotStarted) }}
						            
						            @endif
					            </td>
					          </tr>
				         @else
				         @endif
			         @endforeach
			        </tbody>
			      </table>
	</div>			    
</div>
@endsection
