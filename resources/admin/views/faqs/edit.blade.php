@extends('admin::layouts.default')

@section('content')
	<form name="form" method="POST" action="{{ route('admin.faqs.edit') }}" accept-charset="UTF-8" ng-controller="FAQsController" ng-submit="submit($event, form)" autocomplete="off" novalidate>
		<input type="hidden" name="id" value="{{ $resource['id'] }}" ng-model="formData.id" ng-init="formData.id='{{ $resource['id'] }}'">
		<div class="row">
			<div class="col-sm-9">
				<div class="box box-primary">
					<div class="box-body clearfix">
						<div class="form-group">
							<label class="required" for="faq_category_id">FAQ Category</label>
							<select class="form-control" name="faq_category_id" id="faq_category_id" ng-model="formData.faq_category_id" ng-init="formData.faq_category_id = {{ old('faq_category_id', ((isset($resource['faq_category_id'])) ? $resource['faq_category_id'] : 0)) }}" ng-options="faqcategory.title for faqcategory in faqcategories track by faqcategory.id" validation="required">
								<option value="">----</option>
							</select>
							<div class="form-messages help-block" ng-messages="form.faq_category_id.$error" ng-if="form.faq_category_id.$invalid && (form.$submitted || form.faq_category_id.$touched)">
								<span ng-message="required">FAQ Category is required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="question">Question</label>
							<textarea class="form-control" name="question" id="question" ng-model="formData.question" ng-init="formData.question = '{{ e(old('question', $resource['question'])) }}'" validation="required"></textarea>
							<div class="form-messages help-block" ng-messages="form.question.$error" ng-if="form.question.$invalid && (form.$submitted || form.question.$touched)">
								<span ng-message="required">Question is required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="required" for="answer">Answer</label>
							<textarea class="form-control" name="answer" id="answer" ng-model="formData.answer" ng-init="formData.answer = '{{ e(old('answer', $resource['answer'])) }}'" validation="required" ckEditor="editorOptions"></textarea>
							<div class="form-messages help-block" ng-messages="form.answer.$error" ng-if="form.answer.$invalid && (form.$submitted || form.answer.$touched)">
								<span ng-message="required">Answer Content is required.</span>
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
						<a href="{{ route('admin.faqs') }}" class="btn btn-default btn-block">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
@overwrite
