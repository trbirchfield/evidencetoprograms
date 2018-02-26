@extends('admin::layouts.default')

@section('content')
	<form name="form" method="POST" action="{{ route('admin.featuredprogramcomments.edit') }}" accept-charset="UTF-8" ng-controller="FeaturedProgramCommentsController" ng-submit="submit($event, form)" autocomplete="off" novalidate>
		<input type="hidden" name="id" value="{{ $resource['id'] }}" ng-model="formData.id" ng-init="formData.id='{{ $resource['id'] }}'">
		<div class="row">
			<div class="col-sm-9">
				<div class="box box-primary">
					<div class="box-body clearfix">
						<div class="form-group">
							<label class="required" for="featured_program_id">Featured Program</label>
							<select disabled class="form-control" name="featured_program_id" id="featured_program_id" ng-model="formData.featured_program_id" ng-init="formData.featured_program_id = {{ old('featured_program_id', ((isset($resource['featured_program_id'])) ? $resource['featured_program_id'] : 0)) }}" ng-options="featuredprogram.title for featuredprogram in featuredprograms track by featuredprogram.id" validation="required">
								<option value="">----</option>
							</select>
							<div class="form-messages help-block" ng-messages="form.featured_program_id.$error" ng-if="form.featured_program_id.$invalid && (form.$submitted || form.featured_program_id.$touched)">
								<span ng-message="required">Featured Programis required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="fname">Name</label>
							<input readonly class="form-control" type="text" name="fname" id="fname" ng-model="formData.fname" ng-init="formData.fname = '{{ e(old('fname', $resource['fname'])) }}'" validation="required">
							<div class="form-messages help-block" ng-messages="form.fname.$error" ng-if="form.fname.$invalid && (form.$submitted || form.fname.$touched)">
								<span ng-message="required">Name is required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="email">Email</label>
							<input readonly class="form-control" type="text" name="email" id="email" ng-model="formData.email" ng-init="formData.email = '{{ e(old('email', $resource['email'])) }}'" validation="required">
							<div class="form-messages help-block" ng-messages="form.email.$error" ng-if="form.email.$invalid && (form.$submitted || form.email.$touched)">
								<span ng-message="required">Email is required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="comment">Comment</label>
							<textarea class="form-control" name="comment" id="comment" ng-model="formData.comment" ng-init="formData.comment = '{{ e(old('comment', $resource['comment'])) }}'" validation="required"></textarea>
							<div class="form-messages help-block" ng-messages="form.comment.$error" ng-if="form.comment.$invalid && (form.$submitted || form.comment.$touched)">
								<span ng-message="required">Comment is required.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="box box-solid">
					<div class="box-body clearfix">
						<button type="submit" class="btn btn-primary btn-block">Approve</button>
						<a href="{{ route('admin.faqs') }}" class="btn btn-default btn-block">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
@overwrite
