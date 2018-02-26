@extends('admin::layouts.master')

@section('template')
	@include('admin::partials.header')
	<div class="wrapper">
		@include('admin::partials.sidebar')
		<div class="page-wrapper">
			@include('admin::partials.breadcrumbs')
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
	</div>
@stop
