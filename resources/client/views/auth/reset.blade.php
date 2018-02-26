@extends('client::layouts.default')

@section('content')
	<div class="hero hero-login page-section section-full-width">
		<div class="row" ng-controller="BasicFormController" ng-cloak>
			<div class="columns small-12">
				<div class="panel panel-content panel-login">
					<div class="panel-header text-center">
						<h2>{{ $page_title }}</h2>
						<p>Enter and confirm your new password.</p>
					</div>
					<div class="panel-body">
						<form name="form" action="{{ route('password.update') }}" method="POST" ng-submit="submit($event, form)" novalidate>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="token" value="{{ $token }}">
							<div class="form-group" ng-class="{ 'error': form.email.$invalid && (form.$submitted) }">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" ng-model="formData.email" ng-init="formData.email = '{{ old('email') }}'" validation="required|email">
								<small class="form-messages error" ng-messages="form.email.$error" ng-if="form.email.$invalid && (form.$submitted)">
									<span ng-message="required">Email is required.</span>
									<span ng-message="email">Please enter a valid email.</span>
								</small>
							</div>
							<div class="form-group" ng-class="{ 'error': form.password.$invalid && (form.$submitted) }">
								<label for="password">New Password</label>
								<input type="password" name="password" id="password" class="form-control" ng-model="formData.password" validation="required|min:6">
								<small class="form-messages error" ng-messages="form.password.$error" ng-if="form.password.$invalid && (form.$submitted)">
									<span ng-message="required">Password is required.</span>
									<span ng-message="min">Password must be at least 6 characters long.</span>
								</small>
							</div>
							<div class="form-group" ng-class="{ 'error': form.password_confirmation.$invalid && (form.$submitted) }">
								<label for="password_confirmation">Confirm New Password</label>
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" ng-model="formData.password_confirmation" validation="required">
								<small class="form-messages error" ng-messages="form.password_confirmation.$error" ng-if="form.password_confirmation.$invalid && (form.$submitted)">
									<span ng-message="required">Password confirmation is required.</span>
								</small>
							</div>
							<button type="submit" class="button expand small">Reset Password</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
