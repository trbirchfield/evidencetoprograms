@extends('client::layouts.blank')

@section('content')
	<div class="row" ng-controller="BasicFormController" ng-cloak>
		<div class="large-6 columns">
			<h2>{{ $page_title }}</h2>
			<form name="form" action="/test/form" method="POST" ng-submit="submit($event, form)" novalidate>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="email_trap_123">
				<div class="form-group" ng-class="{ error: form.name.$invalid && (form.$submitted || form.name.$touched) }">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" ng-model="formData.name" ng-init="formData.name = '{{ old('name') }}'" validation="required|min:4|max:10">
					<small class="form-messages error" ng-messages="form.name.$error" ng-if="form.name.$invalid && (form.$submitted || form.name.$touched)">
						<span ng-message="required">Field is required.</span>
						<span ng-message="min">Field must be at least 4 characters.</span>
						<span ng-message="max">Field can be no longer than 10 characters.</span>
					</small>
				</div>
				<div class="form-group" ng-class="{ error: form.email.$invalid && (form.$submitted || form.email.$touched) }">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" ng-model="formData.email" ng-init="formData.email = '{{ old('email') }}'" validation="required|email">
					<small class="form-messages error" ng-messages="form.email.$error" ng-if="form.email.$invalid && (form.$submitted || form.email.$touched)">
						<span ng-message="required">Field is required.</span>
						<span ng-message="email">Please enter a valid email.</span>
					</small>
				</div>
				<div class="form-group" ng-class="{ error: form.message.$invalid && (form.$submitted || form.message.$touched) }">
					<label for="message">Message</label>
					<textarea name="message" id="message" ng-model="formData.message" ng-init="formData.message = '{{ old('message') }}'" validation="required"></textarea>
					<small class="form-messages error" ng-messages="form.message.$error" ng-if="form.message.$invalid && (form.$submitted || form.message.$touched)">
						<span ng-message="required">Field is required.</span>
					</small>
				</div>
				<button type="submit" class="button">Submit</button>
			</form>
		</div>
	</div>
@endsection
