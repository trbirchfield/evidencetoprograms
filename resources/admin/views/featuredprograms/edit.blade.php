@extends('admin::layouts.default')

@section('content')
	<form name="form" method="POST" action="{{ route('admin.featuredprograms.edit') }}" accept-charset="UTF-8" ng-controller="FeaturedProgramsController" ng-submit="submit($event, form)" autocomplete="off" novalidate>
		<input type="hidden" name="id" value="{{ $resource['id'] }}" ng-model="formData.id" ng-init="formData.id='{{ $resource['id'] }}'">
		<div class="row">
			<div class="col-sm-9">
				<div class="box box-primary">
					<div class="box-body clearfix">
						<div class="form-group">
							<label class="required" for="title">Title</label>
							<input class="form-control" type="text" name="title" id="title" ng-model="formData.title" ng-init="formData.title = '{{ e(old('title', $resource['title'])) }}'" validation="required">
							<div class="form-messages help-block" ng-messages="form.title.$error" ng-if="form.title.$invalid && (form.$submitted || form.title.$touched)">
								<span ng-message="required">Title is required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="title">Photo</label>
							<p ng-if="formData.image"  ng-show="formData.image_url"><img ng-src="<% formData.image_url %>" /></p>
							<input type="hidden" name="image" id="image" ng-init="formData.image = '{{ e(old('image', $resource['image'])) }}'; formData.image_url = '/{{ config('site.uploads.content') }}/{{ e(old('image', $resource['image'])) }}'" value="<% formData.image %>">
							<a href="#" class="button secondary tiny expand no-margin" ngf-select ngf-multiple="false" ngf-change="handleFileUpload($event, $files)" ng-show="!formData.image"><i class="fa fa-cloud-upload"></i> Upload</a>
							<a href="#" class="button secondary tiny expand no-margin" ng-click="removePhoto($event)" ng-show="formData.image"><i class="fa fa-trash-o"></i> Remove</a>
						</div>
						<div class="form-group">
							<label for="youtube_id">Youtube ID</label>
							<input class="form-control" type="text" name="youtube_id" id="youtube_id" ng-model="formData.youtube_id" ng-init="formData.youtube_id = '{{ e(old('youtube_id', $resource['youtube_id'])) }}'">
							<div class="form-messages help-block" ng-messages="form.youtube_id.$error" ng-if="form.youtube_id.$invalid && (form.$submitted || form.youtube_id.$touched)">
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="summary">Summary</label>
							<textarea class="form-control" name="summary" id="summary" ng-model="formData.summary" ng-init="formData.summary = '{{ e(old('summary', $resource['summary'])) }}'" validation="required" ckEditor="editorOptions"></textarea>
							<div class="form-messages help-block" ng-messages="form.summary.$error" ng-if="form.summary.$invalid && (form.$submitted || form.summary.$touched)">
								<span ng-message="required">Summary is required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="status">Status</label>
							<select class="form-control" name="status" id="status" ng-model="formData.status" ng-init="formData.status = {{ old('status', $resource['status']) }}" ng-options="status.status for status in statuses track by status.id" validation="required">
								<option value="">----</option>
							</select>
							<div class="form-messages help-block" ng-messages="form.status.$error" ng-if="form.status.$invalid && (form.$submitted || form.status.$touched)">
								<span ng-message="required">Status is required.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="box box-solid">
					<div class="box-body clearfix">
						<button type="submit" class="btn btn-primary btn-block">Save</button>
						<a href="{{ route('admin.featuredprograms') }}" class="btn btn-default btn-block">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
@overwrite
