@extends('admin::layouts.blank')

@section('content')
	<div ng-controller="AuthFormController">
		<div class="container">
			<div class="panel panel-default panel-login">
				<div class="panel-heading">
					<h3 class="panel-title text-center"><img class="ie-svg logo-login" src="/public/img/logo.png" alt="{{ config('site.client.company_name') }}"></h3>
				</div>
				<div class="panel-body" ng-show="showLogin" ng-cloak>
					<form name="loginForm" action="{{ route('admin.login.attempt') }}" method="POST" ng-submit="login($event, loginForm)" novalidate>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control" ng-model="loginFormData.email" autofocus validation="required|email">
							<div class="form-messages help-block" ng-messages="loginForm.email.$error" ng-if="loginForm.email.$invalid && (loginForm.$submitted || loginForm.email.$touched)">
								<span ng-message="required">Email is required.</span>
								<span ng-message="email">Please enter a valid email.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" ng-model="loginFormData.password" validation="required">
							<div class="form-messages help-block" ng-messages="loginForm.password.$error" ng-if="loginForm.password.$invalid && (loginForm.$submitted || loginForm.password.$touched)">
								<span ng-message="required">Password is required.</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<div class="checkbox">
									<label for="remember">
										<input type="checkbox" name="remember" id="remember" ng-model="loginFormData.remember" ng-init="loginFormData.remember = false"> Keep me logged in
									</label>
								</div>
							</div>
							<div class="col-xs-4">
								<button type="submit" class="btn btn-default pull-right">Login</button>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-body" ng-show="!showLogin" ng-cloak>
					<form name="resetForm" action="{{ route('admin.password.email') }}" method="POST" ng-submit="reset($event, resetForm)" novalidate>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control" ng-model="resetFormData.email" validation="required|email">
							<div class="form-messages help-block" ng-messages="resetForm.email.$error" ng-if="resetForm.email.$invalid && (resetForm.$submitted || resetForm.email.$touched)">
								<span ng-message="required">Email is required.</span>
								<span ng-message="email">Please enter a valid email.</span>
							</div>
						</div>
						<button type="submit" class="btn btn-default pull-right">Recover password</button>
					</form>
				</div>
				<div class="panel-footer text-center">
					<a href="javascript:void(0);" ng-show="showLogin" ng-click="showLogin = false">Forgot your password?</a>
					<a href="javascript:void(0);" ng-show="!showLogin" ng-click="showLogin = true" ng-cloak>&larr; Back to login</a>
				</div>
			</div>
		</div>
	</div>
@stop
