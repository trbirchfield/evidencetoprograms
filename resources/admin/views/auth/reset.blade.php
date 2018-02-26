@extends('admin::layouts.blank')

@section('content')
	<div ng-controller="BasicFormController">
		<div class="container">
			<div class="panel panel-default panel-login">
				<div class="panel-heading">
					<h3 class="panel-title text-center"><img class="ie-svg logo-login" src="/public/img/logo-primary.svg" alt="{{ config('site.client.company_name') }}"></h3>
				</div>
				<div class="panel-body" ng-cloak>
					<form name="form" action="{{ route('admin.password.update') }}" method="POST" ng-submit="submit($event, form)" novalidate>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control" ng-model="formData.email" ng-init="formData.email = '{{ old('email') }}'" validation="required|email">
							<div class="form-messages help-block" ng-messages="form.email.$error" ng-if="form.email.$invalid && (form.$submitted || form.email.$touched)">
								<span ng-message="required">Email is required.</span>
								<span ng-message="email">Please enter a valid email.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password">New Password</label>
							<input type="password" name="password" id="password" class="form-control" ng-model="formData.password" validation="required|min:6">
							<div class="form-messages help-block" ng-messages="form.password.$error" ng-if="form.password.$invalid && (form.$submitted || form.password.$touched)">
								<span ng-message="required">Password is required.</span>
								<span ng-message="min">Password must be at least 6 characters long.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password_confirmation">Confirm New Password</label>
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" ng-model="formData.password_confirmation" validation="required">
							<div class="form-messages help-block" ng-messages="form.password_confirmation.$error" ng-if="form.password_confirmation.$invalid && (form.$submitted || form.password_confirmation.$touched)">
								<span ng-message="required">Password confirmation is required.</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-default pull-right">Reset Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop
