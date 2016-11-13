@extends('layouts.base')

@section('contents')

	<form action="{{ URL::route('account-create-post') }}" method="post">
		<input type="submit" value="Create Account">
		{{ Form::token() }}
	</form>

@stop