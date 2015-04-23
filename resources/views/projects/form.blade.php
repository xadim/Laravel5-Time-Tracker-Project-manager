<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

<div class="form-group">

	{!! Form::label('client_id', 'Client:') !!}
	{!! Form::text('client_id', null, ['id' =>  'client', 'class'=>'form-control']) !!}
	<input name="client_id" type="hidden" id="clienth" />

</div>

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
	<input type="button" class="btn btn-success" value="Back" onclick="window.history.back()" /> 
	
</div>



