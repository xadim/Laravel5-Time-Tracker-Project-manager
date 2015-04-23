<input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

	{!! Form::label('title', 'title:') !!}
	{!! Form::text('title', null, ['class'=>'form-control']) !!}
	{!! $errors->first('title', '<span class="help-bloc">:message</span>') !!}

</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-success">Register</button>
	<input type="button" class="btn btn-success" value="Back" onclick="window.history.back()" /> 
</div>




