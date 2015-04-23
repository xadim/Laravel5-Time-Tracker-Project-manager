@extends('app')

@section('content')

<?php

	$dt = new DateTime;
	$today = $dt->format('Y-m-d');

	$count = 0;

?>
			      	
<div class="row">
	<div class="col-md-12">
			      
	<h4>Today <a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
		<div class="pull-right">
			<a href="{{ url('phases') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>
	</h4>

	<div class="log green"></div>
    <div  id="timing">

      <table class="table">
		            	
        <thead class="bghead">
          <tr>
          	<th class="th"></th>
          	<th>Client</th>
            <th>Projects</th>
            <th>Task</th>
            <th>Type</th>
            <th>Time Track</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <tbody>
        	@foreach ($phases as $phase)

        	<?php
	            
	            $timing = phaseTracker($phase->id);
	            

	            if ($timing != "Task not started") {
	            	$elapseTime = secondsToTimeSimple(toSeconds($timing));
	            }else{
	            	$elapseTime = "0 : 00 : 00 s";
	            }
	       	
				$status = timingCollections($phase->id)['status'];
				$status_id = timingCollections($phase->id)['id'];
				
				$created_at = explodeString($phase->created_at); 
				$updated_at = explodeString($phase->updated_at); 
				
				$created = $created_at[0];
				$updated = $updated_at[0];
				
				if ($created >= $today or $updated >= $today) {
					$count++;
            ?>
            	@if( ($phase->user_id != 3) && ($phase->user_id == Auth::user()->id) )
			          <tr class="project-table trhover">
			          	<td>
			          		<a class="delete" href="javascript:deletePhase('{{ $phase->id }}');">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
			          	<td><a class="" href="{{ url('searchClientsPhases/'.$phase->client_id) }}">{!! clientName(clientIdentification($phase->project_id)) !!}</a></td>
			            <td><a class="" href="{{ url('searchPhase/'.$phase->project_id) }}">{!! projectTitle($phase->project_id) !!}</a></td>
			            <td>
			            	<input type="text" class="nobox" value="{{ $phase->description }}" onchange="getval(this);" id="{{ $phase->id }}"/>
			            </td>
			            <td><a class="" href="{{ url('searchPerType/'.$phase->type_id) }}">{{ typeTitle($phase->type_id) }}</a></td>
			            
			            <td>

				            {{ $elapseTime }}
			            	
			            </td>
			            <td class="text-center">
				            	@if ($status == 'notStart')
					
									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, notStart');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span>
									</a>
								
								@elseif ($status == 'start')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, start');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'pause')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, pause');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@elseif ($status == 'restart')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, restart');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'end')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, end');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@endif
			            </td>
			            </div>
			          </tr>
			    @elseif (Auth::user()->id == 3)
			    	<tr class="project-table trhover">
			          	<td>
			          		<a class="delete" href="javascript:deletePhase('{{ $phase->id }}');">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
			          	<td><a class="" href="{{ url('searchClientsPhases/'.$phase->client_id) }}">{!! clientName(clientIdentification($phase->project_id)) !!}</a></td>
			            <td><a class="" href="{{ url('searchPhase/'.$phase->project_id) }}">{!! projectTitle($phase->project_id) !!}</a></td>
			            <td>
			            	<input type="text" class="nobox" value="{{ $phase->description }}" onchange="getval(this);" id="{{ $phase->id }}"/>
			            </td>
			            <td><a class="" href="{{ url('searchPerType/'.$phase->type_id) }}">{{ typeTitle($phase->type_id) }}</a></td>
			            
			            <td>

				            {{ $elapseTime }}
			            	
			            </td>
			            <td class="text-center">
				            	@if ($status == 'notStart')
					
									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, notStart');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span>
									</a>
								
								@elseif ($status == 'start')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, start');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'pause')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, pause');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@elseif ($status == 'restart')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, restart');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'end')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, end');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@endif
			            </td>
			            </div>
			          </tr>
			    @endif

		          <?php }?>
	         @endforeach
	         @if ($count == 0)

	         	<tr class="project-table trhover">
		         	<td colspan="7">Any new task recorded today!!!</td>
		        </tr>

	         @endif

	        <tr class="project-table">
	         	<td class="thisWeek" CELLPADDING="10" colspan="7">This Week</td>
	        </tr>


	         @foreach ($phases as $phase)

        	<?php
	            
	            $timing = phaseTracker($phase->id);
	            

	            if ($timing != "Task not started") {
	            	$elapseTime = secondsToTimeSimple(toSeconds($timing));
	            }else{
	            	$elapseTime = "0 : 00 : 00 s";
	            }
	          	
				$status = timingCollections($phase->id)['status'];
				$status_id = timingCollections($phase->id)['id'];

				$created_at = explodeString($phase->created_at); 
				$updated_at = explodeString($phase->updated_at); 
				$created = $created_at[0];
				$updated = $updated_at[0];

				if ($created < $today && $updated < $today) {
				
            ?>
            	@if( ($phase->user_id != 3) && ($phase->user_id == Auth::user()->id) )

            	dd($phase->user_id)
            	
			          <tr class="project-table trhover">
			          	<td>
			          		<a class="delete" href="javascript:deletePhase('{{ $phase->id }}');">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
			          	<td><a class="" href="{{ url('searchClientsPhases/'.$phase->client_id) }}">{!! clientName(clientIdentification($phase->project_id)) !!}</a></td>
			            <td><a class="" href="{{ url('searchPhase/'.$phase->project_id) }}">{!! projectTitle($phase->project_id) !!}</a></td>
			            <td>
			            	<input type="text" class="nobox" value="{{ $phase->description }}" onchange="getval(this);" id="{{ $phase->id }}"/>
			            	
			            </td>
			            <td><a class="" href="{{ url('searchPerType/'.$phase->type_id) }}">{{ typeTitle($phase->type_id) }}</a></td>
			            
			            <td>

				            {{ $elapseTime }}
			            	
			            </td>
			            <td class="text-center">
				            	@if ($status == 'notStart')
					
									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, notStart');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span>
									</a>
								
								@elseif ($status == 'start')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, start');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'pause')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, pause');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@elseif ($status == 'restart')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, restart');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'end')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, end');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@endif
			            </td>
			            </div>
			          </tr>
			    @elseif (Auth::user()->id == 3)
			    	<tr class="project-table trhover">
			          	<td>
			          		<a class="delete" href="javascript:deletePhase('{{ $phase->id }}');">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
			          	<td><a class="" href="{{ url('searchClientsPhases/'.$phase->client_id) }}">{!! clientName(clientIdentification($phase->project_id)) !!}</a></td>
			            <td><a class="" href="{{ url('searchPhase/'.$phase->project_id) }}">{!! projectTitle($phase->project_id) !!}</a></td>
			            <td>
			            	<input type="text" class="nobox" value="{{ $phase->description }}" onchange="getval(this);" id="{{ $phase->id }}"/>
			            	
			            </td>
			            <td><a class="" href="{{ url('searchPerType/'.$phase->type_id) }}">{{ typeTitle($phase->type_id) }}</a></td>
			            
			            <td>

				            {{ $elapseTime }}
			            	
			            </td>
			            <td class="text-center">
				            	@if ($status == 'notStart')
					
									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, notStart');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span>
									</a>
								
								@elseif ($status == 'start')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, start');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'pause')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, pause');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@elseif ($status == 'restart')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, restart');">
										<span class="glyphicon glyphicon-pause red" aria-hidden="true"></span></a>
								
								@elseif ($status == 'end')

									<a href="javascript:UpdateTiming('{{ $status_id }}, {{ $phase->id }}, status, end');">
										<span class="glyphicon glyphicon-play green" aria-hidden="true"></span></a>
								
								@endif
			            </td>
			            </div>
			          </tr>
			    @endif
		          <?php }?>
	         @endforeach

	         @if ($phases->render())
		        <tr class="project-table">
		         	<td colspan="7">
				         <?php echo $phases->render(); ?>	
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
	        <h4 class="modal-title" id="myModalLabel">Add new Phase</h4>
	      </div>
	      <div class="modal-body">

			{!! Form::open(['route' => 'phases.store', 'id'=>'phase_form']) !!}

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

					<div class="form-group">

						<label>Project:</label>
						<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
						<input name="project_id" type="text" id="project" class='form-control' />
						<input name="project_id" type="hidden" id="projecth" />
						<input name="client_id" type="hidden" id="client" />

					</div>

					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

						<label>Description:</label>
						<input name="description" type="text" id="project" class='form-control' />

					</div>

					<div class="form-group">
						<label>Type</label>


						<select name="type_id">
						    @foreach(retrieveAllTypes() as $type)
						    <option value="{{ $type->id }}">{{ $type->title }}</option>
						    @endforeach
						</select>


					</div>

					<div class="form-group text-center">

						{!! Form::submit('Go!', ['class'=>'btn btn-success']) !!}
						<input type="button" class="btn btn-success" value="Back"  data-dismiss="modal" /> 
						
					</div>
	    		{!! Form::close() !!}
			</div>

	    </div>
	  </div>
	</div>



@endsection





