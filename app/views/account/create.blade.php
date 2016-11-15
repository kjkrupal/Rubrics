@extends('layouts.base')

@section('contents')

	<form action="{{ URL::route('account-create-post') }}" method="post">
		
		<div class="field">

			Email: <input type="text" name="email"{{ (Input::old('email')) ? ' value ="' . Input::old('email') . '"' : '' }}>
			@if ($errors->has('email'))
				{{ $errors->first('email') }}<br>
			@endif
		</div>
		<div class="field">
			Username: <input type="text" name="username"{{ (Input::old('username')) ? ' value ="' . Input::old('username') . '"' : '' }}>
			@if ($errors->has('username'))
				{{ $errors->first('username') }}<br>
			@endif
		</div>
		<div class="field">
			Password: <input type="password" name="password">
			@if ($errors->has('password'))
				{{ $errors->first('password') }}<br>
			@endif
		</div>
		<div class="field">
			Re-Type Password: <input type="password" name="re-type">
			@if ($errors->has('re-type'))
				{{ $errors->first('re-type') }}<br>
			@endif
		</div>
		<div class="field">	
			<input type="submit" value="Create Account">
			{{ Form::token() }}
		</div>
	</form>

@stop