

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

	{!! Form::label('name', 'name:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
	{!! $errors->first('name', '<span class="help-bloc">:message</span>') !!}

</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

	{!! Form::label('email', 'email:') !!}
	{!! Form::text('email', null, ['class'=>'form-control']) !!}
	{!! $errors->first('email', '<span class="help-bloc">:message</span>') !!}

</div>

<div class="form-group">

	{!! Form::label('password', 'password:') !!}
	{!! Form::password('password', ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('password_confirmation', 'Confirm Password:') !!}
	{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}

</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-success">Register</button>
	<input type="button" class="btn btn-success" value="Back" onclick="window.history.back()" /> 
</div>




