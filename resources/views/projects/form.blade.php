<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

<?php $timeTracker = new timeTracker;?>

@if ($taskdesigns != '')

	<input name="project_id" type="hidden" value="{{ $project->id }}">
	<input name="task_designs_update" type="hidden" value="{{ $task->task_designs }}">
	<input name="task_prod_update" type="hidden" value="{{ $task->task_prod }}">
	<input name="task_dev_update" type="hidden" value="{{ $task->task_dev }}">
	<input name="status_task_designs_up" type="hidden" value="{{ $task->status_task_designs }}">
	<input name="status_task_prod_up" type="hidden" value="{{ $task->status_task_prod }}">
	<input name="status_task_dev_up" type="hidden" value="{{ $task->status_task_dev }}">

@endif

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class'=>'form-control']) !!}
	{!! $errors->first('title', '<span class="help-bloc">:message</span>') !!}

</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', null, ['class'=>'form-control']) !!}
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

	{!! Form::label('authorized_users', 'Other Users (separate with comma):') !!}
	{!! Form::text('authorized_users', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	@if ($taskdesigns != '')


		<? $status = $task->status_task_designs; 
			if ($status == "pause") {
				$suffix = 'd: ';
			} else{
				$suffix = 'ed: ';
		} ?>

		@if ($timeTracker->designsTimeTracker($project->id) != 'Task not started')
			<em>Designs task time spended</em>:
			{!! format_interval($timeTracker->designsTimeTracker($project->id)) !!} <br>
		@endif


		{!! Form::label('task_designs', 'Time '. $task->status_task_designs). $suffix !!}

		<? $status = $task->status_task_designs ?>
		
		@if ($status == 'notStart')
		
			<div class="hidebox"> {!! Form::radio('task_designs', null, true) !!}</div>
			{!! Form::radio('task_designs', 'start') !!} Start&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'start')

			<div class="hidebox"> {!! Form::radio('task_designs', null, true) !!}</div>
			{!! Form::radio('task_designs', 'pause') !!} Pause&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_designs', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'pause')

			<div class="hidebox"> {!! Form::radio('task_designs', null, true) !!}</div>
			{!! Form::radio('task_designs', 'restart') !!} Restart&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_designs', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'restart')

			<div class="hidebox"> {!! Form::radio('task_designs', null, true) !!}</div>
			{!! Form::radio('task_designs', 'pause') !!} Pause&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_designs', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'end')

			Task finished
		
		@endif
	@else

		{!! Form::label('task_designs', 'Designs: ') !!}
		{!! Form::radio('task_designs', 'notStart',true) !!} No&nbsp;&nbsp;&nbsp;
		{!! Form::radio('task_designs', 'start') !!} Start&nbsp;&nbsp;&nbsp;
		{!! Form::radio('task_designs', 'end') !!} Finish&nbsp;&nbsp;&nbsp;

	@endif

</div>

<div class="form-group">

	

	@if ($taskdesigns != '')

		<? $status = $task->status_task_prod; 
			if ($status == "pause") {
				$suffix = 'd: ';
			} else{
				$suffix = 'ed: ';
		} ?>

		@if ($timeTracker->prodTimeTracker($project->id) != 'Task not started')
			<em>Production task time spended</em>:
			{!! format_interval($timeTracker->prodTimeTracker($project->id)) !!} <br>
		@endif
		

		{!! Form::label('task_prod', 'Production task was '. $task->status_task_prod). $suffix !!}

		@if ($status == 'notStart')
		
		<div class="hidebox"> {!! Form::radio('task_prod', null, true) !!}</div>
		{!! Form::radio('task_prod', 'start') !!} Start&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'start')

			<div class="hidebox"> {!! Form::radio('task_prod', null, true) !!}</div>
			{!! Form::radio('task_prod', 'pause') !!} Pause&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_prod', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'pause')

			<div class="hidebox"> {!! Form::radio('task_prod', null, true) !!}</div>
			{!! Form::radio('task_prod', 'restart') !!} Restart&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_prod', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'restart')

			<div class="hidebox"> {!! Form::radio('task_prod', null, true) !!}</div>
			{!! Form::radio('task_prod', 'pause') !!} Pause&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_prod', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'end')

			Task finished
		
		@endif
	@else

		{!! Form::label('task_prod', 'Production:') !!}
		{!! Form::radio('task_prod', 'notStart',true) !!} No&nbsp;&nbsp;&nbsp;
		{!! Form::radio('task_prod', 'start') !!} Start&nbsp;&nbsp;&nbsp;
		{!! Form::radio('task_prod', 'end') !!} Finish&nbsp;&nbsp;&nbsp;

	@endif

</div>

<div class="form-group">

	

	@if ($taskdesigns != '')


		<? $status = $task->status_task_dev; 
			if ($status == "pause") {
				$suffix = 'd: ';
			} else{
				$suffix = 'ed: ';
		} ?>

		
		@if ($timeTracker->devTimeTracker($project->id) != 'Task not started')
			<em>Development task time spended</em>:
			{!! format_interval($timeTracker->devTimeTracker($project->id)) !!} <br>
		@endif

		{!! Form::label('task_dev', 'Development task was '. $task->status_task_dev). $suffix !!}

		<? $status = $task->status_task_dev ?>

		@if ($status == 'notStart')
		
			<div class="hidebox"> {!! Form::radio('task_dev', null, true) !!}</div>
			{!! Form::radio('task_dev', 'start') !!} Start&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'start')

			<div class="hidebox"> {!! Form::radio('task_dev', null, true) !!}</div>
			{!! Form::radio('task_dev', 'pause') !!} Pause&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_dev', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'pause')

			<div class="hidebox"> {!! Form::radio('task_dev', null, true) !!}</div>
			{!! Form::radio('task_dev', 'restart') !!} Restart&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_dev', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'restart')

			<div class="hidebox"> {!! Form::radio('task_dev', null, true) !!}</div>
			{!! Form::radio('task_dev', 'pause') !!} Pause&nbsp;&nbsp;&nbsp;
			{!! Form::radio('task_dev', 'end') !!} Finish&nbsp;&nbsp;&nbsp;
		
		@elseif ($status == 'end')

			Task finished
		
		@endif
	@else

		{!! Form::label('task_dev', 'Development:') !!}
		{!! Form::radio('task_dev', 'notStart',true) !!} No&nbsp;&nbsp;&nbsp;
		{!! Form::radio('task_dev', 'start') !!} Start&nbsp;&nbsp;&nbsp;
		{!! Form::radio('task_dev', 'end') !!} Finish&nbsp;&nbsp;&nbsp;

	@endif

</div>

<div class="form-group">

	{!! Form::label('status', 'Status:') !!}
	{!! Form::select('status', [
	   'Work-in-Progress' => 'Work-in-Progress',
	   'Shipped' => 'Shipped to the client',
	   'Work-Done' => 'Work Done'],
	   ['class'=>'form-control']
	) !!}

</div>

<div class="form-group">

	{!! Form::submit('Go!', ['class'=>'btn btn-success']) !!}
	<input type="button" class="btn btn-success" value="Back" onclick="window.history.back()" /> 
	
</div>