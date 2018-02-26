@extends('admin::layouts.email')

@section('content')
	<p>Hello {{ $user->name }},</p>
	<p>Access the following link to change your password.</p>
	<p>{{ route('admin.password.reset', [$token]) }}</p>
	<p>Regards</p>
@stop
