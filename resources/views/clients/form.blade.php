<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

	{!! Form::label('name', 'name:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
	{!! $errors->first('name', '<span class="help-bloc">:message</span>') !!}

</div>

<div class="form-group">

	{!! Form::label('address', 'address:') !!}
	{!! Form::text('address', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('city', 'city:') !!}
	{!! Form::text('city', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('state', 'state:') !!}
	{!! Form::text('state', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('country', 'country:') !!}
	{!! Form::text('country', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('postal', 'postal:') !!}
	{!! Form::text('postal', null, ['class'=>'form-control']) !!}

</div>


<div class="form-group">

	{!! Form::label('email', 'email:') !!}
	{!! Form::text('email', null, ['class'=>'form-control']) !!}

</div>


<div class="form-group">

	{!! Form::label('phone1', 'phone1:') !!}
	{!! Form::text('phone1', null, ['class'=>'form-control']) !!}

</div>


<div class="form-group">

	{!! Form::label('phone2', 'phone2:') !!}
	{!! Form::text('phone2', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('person', 'person:') !!}
	{!! Form::text('person', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-success">Register</button>
	<input type="button" class="btn btn-success" value="Back" onclick="window.history.back()" /> 
</div>




