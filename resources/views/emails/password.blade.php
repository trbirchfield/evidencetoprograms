@extends('emails.layout')

@section('content')
	Click here to reset your password: {{ url('password/reset/' . $token) }}
@stop
