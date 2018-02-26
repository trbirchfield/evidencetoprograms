@extends('admin::layouts.list')

@section('filters')
	<div class="row" ng-controller="FAQsListController">
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="form-group">
				<label for="filter_status">Status</label>
				<select id="filter_status" class="form-control" ng-model="filterFormData.filter_status" ng-options="status.status for status in statuses track by status.id">
					<option value="">----</option>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="form-group">
				<label for="filter_category_id">Category</label>
				<select id="filter_category_id" class="form-control" ng-model="filterFormData.filter_category_id" ng-options="faqcategory.title for faqcategory in faqcategories track by faqcategory.id">
					<option value="">----</option>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="form-group">
				<label for="filter_keyword">Keyword</label>
				<input id="filter_keyword" class="form-control" ng-model="filterFormData.filter_keyword">
			</div>
		</div>
	</div>
@stop
