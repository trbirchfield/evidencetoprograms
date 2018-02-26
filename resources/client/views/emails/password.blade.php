@extends('client::layouts.email')

@section('content')
	<p>Hello {{ $user->name }},</p>
	<p>Access the following link to change your password.</p>
	<p>{{ route('password.reset', [$token]) }}</p>
	<p>Regards</p>
@stop
