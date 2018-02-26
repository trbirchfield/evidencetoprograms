@extends('client::layouts.default')

@section('content')
	<div class="hero hero-login page-section section-full-width">
		<div class="row" ng-controller="BasicFormController" ng-cloak>
			<div class="columns small-12" ng-controller="AuthFormController">
				<div class="panel panel-content panel-login">
					<!-- Login Form -->
					<div class="panel-header text-center" ng-show="showLogin">
						<h2>{{ $page_title }}</h2>
						<p>Sign in to your account.</p>
					</div>
					<div class="panel-body" ng-show="showLogin">
						<form name="loginForm" action="{{ route('login') }}" method="POST" ng-submit="submitLoginForm($event, loginForm)" novalidate>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group" ng-class="{ 'error': loginForm.email.$invalid && (loginForm.$submitted) }">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" ng-model="loginFormData.email" autofocus validation="required|email">
								<small class="form-messages error" ng-messages="loginForm.email.$error" ng-if="loginForm.email.$invalid && (loginForm.$submitted)">
									<span ng-message="required">Email is required.</span>
									<span ng-message="email">Please enter a valid email.</span>
								</small>
							</div>
							<div class="form-group" ng-class="{ 'error': loginForm.password.$invalid && (loginForm.$submitted) }">
								<div class="row">
									<div class="columns small-4">
										<label for="password">Password</label>
									</div>
									<div class="columns small-8 text-right">
										<small><a class="no-border forgot-password" href="javascript:void(0);" ng-click="showLogin = false" tabindex="-1">Forgot your password?</a></small>
									</div>
								</div>
								<input type="password" name="password" id="password" class="form-control" ng-model="loginFormData.password" validation="required">
								<small class="form-messages error" ng-messages="loginForm.password.$error" ng-if="loginForm.password.$invalid && (loginForm.$submitted)">
									<span ng-message="required">Password is required.</span>
								</small>
							</div>
							<div class="row">
								<div class="columns small-12">
									<button type="submit" class="button expand small">Sign In</button>
								</div>
							</div>
							<div class="row">
								<div class="columns small-12">
									<div class="checkbox">
										<input type="checkbox" name="remember" id="remember" ng-model="loginFormData.remember" ng-init="loginFormData.remember = false">
										<label for="remember" class="label-checkbox">Keep me logged in</label>
									</div>
								</div>
							</div>
						</form>
					</div>

					<!-- Reset Password Form -->
					<div class="panel-header text-center" ng-show="!showLogin">
						<h2>Forgot Password?</h2>
						<p>Send password reset instructions.</p>
					</div>
					<div class="panel-body" ng-show="!showLogin" ng-cloak>
						<form name="resetPasswordForm" action="{{ route('password.email') }}" method="POST" ng-submit="submitResetPasswordForm($event, resetPasswordForm)" novalidate>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group" ng-class="{ 'error': resetPasswordForm.email.$invalid && (resetPasswordForm.$submitted) }">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" ng-model="resetPasswordFormData.email" validation="required|email">
								<small class="form-messages error" ng-messages="resetPasswordForm.email.$error" ng-if="resetPasswordForm.email.$invalid && (resetPasswordForm.$submitted)">
									<span ng-message="required">Email is required.</span>
									<span ng-message="email">Please enter a valid email.</span>
								</small>
							</div>
							<button type="submit" class="button expand small">Send Instructions</button>
						</form>
						<div class="text-center">
							<small><a class="no-border" href="javascript:void(0);" ng-click="showLogin = true" ng-cloak>&larr; Back to login</a></small>
						</div>
					</div>
					<div class="panel-footer text-center">
						<strong>Not a member?</strong> <a href="/#sign-up">Sign up now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
