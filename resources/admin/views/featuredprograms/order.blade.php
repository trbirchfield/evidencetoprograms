@extends('admin::layouts.default')
@section('jquery-plugins')
    @parent
    <script src="{{ asset_version('vendor/jquery-ui.min.js') }}"></script>
@stop
@section('content')
	<div ng-controller="OrderFeaturedProgramsController">
        <div class="row">
            <div class="col-sm-9">
                <nested-sortable item="rootItem" sortable-options="sortableOptions" ng-if="rootItem" sortable-open="true"></nested-sortable>
            </div>
            <div class="col-sm-3">
                <div class="box box-solid">
                    <div class="box-body clearfix">
                        <button type="submit" class="btn btn-primary btn-block" ng-click="savePageOrder(rootItem.children)">Save</button>
                        <a href="{{ route('admin.faqcategories') }}" class="btn btn-default btn-block">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
