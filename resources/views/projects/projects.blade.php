@extends('app')

@section('content')


			      	
<div class="row">
	<div class="col-md-12">
			      
				<h4>
			        @if($word)
			       	We found {{ $projects->count() }} results for 
		      			<strong>
			      			@if (is_numeric($word))
			      				{{ retrieveProjectOwner($word) }}
			      			@else
			      				{{ $word }}
			      			@endif
			      			<a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
		      			</strong>
	      			@else
	      				Projects <a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
		      		@endif
		      		

					<div class="pull-right">
						<a href="{{ url('projects/sortby/Work-in-Progress') }}">
							<span  data-toggle="tooltip" data-placement="top" title="Work in progress" class="glyphicon glyphicon-folder-open black" aria-hidden="true"></span>
						</a>
						<a href="{{ url('projects/sortby/On-hold') }}">
							<span data-toggle="tooltip" data-placement="top" title="On hold" class="glyphicon glyphicon-transfer red" aria-hidden="true"></span>
						</a>
						<a href="{{ url('projects/sortby/Finished') }}">
							<span data-toggle="tooltip" data-placement="top" title="Finished" class="glyphicon glyphicon-send green" aria-hidden="true"></span>
						</a>
						<a href="{{ url('projects/sortby/Billed') }}">
							<span data-toggle="tooltip" data-placement="top" title="Billed" class="glyphicon glyphicon-shopping-cart purple" aria-hidden="true"></span>
						</a>
						<a href="{{ url('projects/sortby/Archived') }}">
							<span data-toggle="tooltip" data-placement="top" title="Archived" class="glyphicon glyphicon-folder-close yellow" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Projects" href="{{ url('projects') }}">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</a>
					</div>
			      </h4>
			<div class="log green"></div>
			<div  id="timing">
				

			      <!-- Table -->
			      <table class="table">
			        <thead class="bghead">
			          <tr>
			          	<th class="th"></th>
			          	<th>Client</th>
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

			        		$timing = projectPhaseTracker($project->id);

							if ($timing != "Task not started") {
				            	$elapseTime = secondsToTimeSimple(toSeconds($timing));
				            }else{
				            	$elapseTime = "0 : 00 : 00 s";
				            }

				            $projectNotStarted = 'Project not started';

				            $projectFinished = 'Project finished';

				            $arr_users = explodeString($project->authorized_users);

			            ?>

				        	@if( ($project->user_id != 3) && ($project->user_id == Auth::user()->id OR in_array(Auth::user()->email, $arr_users) ))
					          <tr class="project-table trhover">
					          	<td>
					          		<a class="delete" href="javascript:deleteProject('{{ $project->slug }}');">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
								</td>
					          	<td><a class="" href="{{ url('clientsProjects/'.$project->client_id) }}">{!! clientName($project->client_id) !!}</a></td>
					            <td>{!! link_to_route('projects.show', $project->title, [$project->slug]) !!}</td>
					            <td>{!! $project->unit !!}</td>
					            <td><a class="" href="{{ url('search/'.$project->user_id) }}">{{ retrieveProjectOwner($project->user_id) }}</a></td>
					            
					            <td>
						            @if($elapseTime != "0 : 00 : 00 s" )
						             	{{ $elapseTime }}
						            @else
						            	Project not started
						            @endif
					            	
					            </td>
					            <td>
					            	{{ $project->status }}
					            </td>
					          </tr>
				         @elseif( Auth::user()->id == 3 )
					          <tr class="project-table trhover">
					          	<td>
					          		<a class="delete" href="javascript:deleteProject('{{ $project->slug }}');">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
								</td>
					          	<td><a class="" href="{{ url('clientsProjects/'.$project->client_id) }}">{!! clientName($project->client_id) !!}</a></td>
					            <td>{!! link_to_route('projects.show', $project->title, [$project->slug]) !!}</td>
					            <td>{!! $project->unit !!}</td>
					            <td><a class="" href="{{ url('search/'.$project->user_id) }}">{{ retrieveProjectOwner($project->user_id) }}</a></td>
					            
					            <td>
						            @if($elapseTime != "0 : 00 : 00 s" )
						             	{{ $elapseTime }}
						            @else
						            	Project not started
						            @endif
					            	
					            </td>
					            <td class="text-center">

										{!! Form::select('status', [
										   $project->status => $project->status,
										   'Work-in-Progress' => 'Work-in-Progress',
										   'On-hold' => 'On hold',
										   'Finished' => 'Finished',
										   'Billed' => 'Billed',
										   'Archived' => 'Archived'],
										    null, ['id' => $project->id, 'onchange'=>'getstatus(this);', 'class' => 'form-control']
										) !!}
					            </td>
					          </tr>
				         @endif
			         @endforeach
			         @if ($projects->render())
			          <tr class="project-table">
			         	<td colspan="7">
					         <?php echo $projects->render(); ?>	
					    </td>
					</tr>
					@endif
			        </tbody>
			      </table>
		</div>	
	</div>			    
</div>

















	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add new Project</h4>
	      </div>
	      <div class="modal-body">


			{!! Form::open(['route' => 'projects.store', 'id'=>'project_form']) !!}

	      	<div class="error red"></div>

	        	@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				
				<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">


					<div class="form-group">

						{!! Form::label('client_id', 'Client:') !!}
						{!! Form::text('client_id', null, ['id' =>  'client', 'class'=>'form-control']) !!}
						<input name="clt_id" type="hidden" id="clienth" />

					</div>

					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

						{!! Form::label('title', 'Title:') !!}
						{!! Form::text('title', null, ['class'=>'form-control']) !!}
						{!! $errors->first('title', '<span class="help-bloc">:message</span>') !!}

					</div>

					<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
						{!! Form::label('slug', 'Slug:') !!}
						{!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'your-project-slug']) !!}
						{!! $errors->first('slug', '<span class="help-bloc">:message</span>') !!}
						
					</div>

					<div class="form-group {{ $errors->has('unit') ? 'has-error' : '' }}">

						{!! Form::label('unit', 'Unit:') !!}
						{!! Form::text('unit', null, ['class'=>'form-control']) !!}
						{!! $errors->first('unit', '<span class="help-bloc">:message</span>') !!}

					</div>

					<div class="form-group">

						{!! Form::label('tags', 'Tags (separate with comma):') !!}
						{!! Form::text('tags', null, ['class'=>'form-control']) !!}

					</div>

					<div class="form-group">

						{!! Form::label('desc', 'Description:') !!}
						{!! Form::textarea('desc', null, ['class'=>'form-control']) !!}

					</div>

					<div class="form-group">

						{!! Form::label('authorized_users', 'Other Users:') !!}
						{!! Form::text('authorized_users', null, ['id' =>  'authorized_users', 'class'=>'form-control']) !!}


					</div>



					<div class="form-group">

						{!! Form::label('status', 'Status:') !!}
						{!! Form::select('status', [
						   'Work-in-Progress' => 'Work-in-Progress',
						   'On-hold' => 'On hold',
						   'Finished' => 'Finished',
						   'Billed' => 'Billed',
						   'Archived' => 'Archived'],
						   null, ['class'=>'form-control']
						) !!}

					</div>

					<div class="form-group">

						{!! Form::submit('Go!', ['class'=>'btn btn-success']) !!}
						<input type="button" class="btn btn-success" value="Back"  data-dismiss="modal" /> 
						
					</div>

	    		{!! Form::close() !!}
			</div>

	    </div>
	  </div>
	</div>





@endsection


