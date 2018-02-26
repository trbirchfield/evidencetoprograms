@extends('admin::layouts.default')

@section('content')
	<form name="form" method="POST" action="{{ route('admin.widgets.edit') }}" accept-charset="UTF-8" ng-controller="WidgetsController" ng-submit="submit($event, form)" autocomplete="off" novalidate>
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
						<a href="{{ route('admin.widgets') }}" class="btn btn-default btn-block">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
@overwrite
