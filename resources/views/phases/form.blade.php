<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

<div class="form-group">

	{!! Form::label('project_id', 'Project:') !!}
	{!! Form::text('project_id', null, ['id' =>  'project', 'class'=>'form-control']) !!}
	<input name="project_id" type="hidden" id="projecth" />
	<input name="client_id" type="hidden" id="client" />

</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

	{!! Form::label('description', 'Description:') !!}
	{!! Form::text('description', null, ['class'=>'form-control']) !!}
	{!! $errors->first('description', '<span class="help-bloc">:message</span>') !!}

</div>

<div class="form-group">

	{!! Form::label('type_id', 'Type:') !!}
	<!--{!! Form::select('type_id',array('0' => 'Please select a category') + $type_lists) !!}-->
	{!! Form::select('type_id', $type_lists) !!}


</div>

<div class="form-group">

	{!! Form::submit('Go!', ['class'=>'btn btn-success']) !!}
	<input type="button" class="btn btn-success" value="Back" onclick="window.history.back()" /> 
	
</div>
	
























