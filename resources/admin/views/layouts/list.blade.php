@extends('admin::layouts.default')

@section('content')
	<div ng-controller="ListController" ng-cloak>
		<span ng-init='init({{ $bootstrap }})'></span>
		@include('admin::partials.filters')
		@if (isset($controls))
			<p>
				@foreach ($controls as $control)
					<a href="/{{ Request::path() }}/{{ $control['action'] }}" class="btn btn-default"><i class="fa fa-{{ $control['icon'] }}"></i> {{ $control['label'] }}</a>
				@endforeach
			</p>
		@endif
		<pagination total-items="totalItems" items-per-page="itemsPerPage" max-size="5" ng-model="currentPage" boundary-links="true" first-text="&laquo;" previous-text="&lsaquo;" next-text="&rsaquo;" last-text="&raquo;" ng-change="getList()"></pagination>
		<div class="panel panel-default">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							@if (!empty($edit) or !empty($view) or !empty($delete))
								<th>Actions</th>
							@endif
							<th ng-repeat="field in fields" ng-click="changeOrder(field.column)" class="sortable-col">
								<span ng-bind="field.display_name"></span>
								<i class="fa fa-sort" ng-class="{'fa-sort-down': orderBy === field.column && orderDir === 'desc', 'fa-sort-up': orderBy === field.column && orderDir === 'asc'}"></i>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="result in data" ng-if="data.length > 0">
							@if (!empty($edit) or !empty($view) or !empty($delete))
								<td>
									@if (!empty($edit))
										<a href="/{{ Request::path() }}/edit/<% result.id %>" class="btn btn-xs btn-default" tooltip-placement="top" tooltip="Edit"><i class="fa fa-edit"></i></a>
									@endif
									@if (!empty($view))
										<a href="/{{ Request::path() }}/view/<% result.id %>" class="btn btn-xs btn-default" tooltip-placement="top" tooltip="View"><i class="fa fa-eye"></i></a>
									@endif
									@if (!empty($delete))
										<a ng-click="openDeleteModal('{{ $delete }}', result.id)" class="btn btn-xs btn-default" tooltip-placement="top" tooltip="Delete"><i class="fa fa-trash-o"></i></a>
									@endif
								</td>
							@endif
							<td ng-repeat="field in fields">
								<span ng-if="field.column === 'status'">
									<div class="checkbox rm-m">
										<label class="rm-p">
											<input ng-init="result.toggle = result[field.column] === {{ \App\Models\Status::ACTIVE }} ? true : false" ng-model="result.toggle" type="checkbox" class="toggle small" ng-change="toggleStatus('/api/{{ Request::segment(2) }}/status/' + result.id, $parent.$index - 1)">
											<span ng-if="result.toggle">Active</span>
											<span ng-if="!result.toggle">Inactive</span>
										</label>
									</div>
								</span>
								<span ng-if="field.column !== 'status'" ng-bind="result[field.column]"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				Showing
				<span ng-if="((currentPage - 1) * itemsPerPage + 1) != filterCount">
					<span ng-bind="(currentPage - 1) * itemsPerPage + 1"></span>
					-
					<span ng-bind="(currentPage === 1 && totalItems <= itemsPerPage) ? filterCount : currentPage * itemsPerPage"></span>
				</span>
				<span ng-if="((currentPage - 1) * itemsPerPage + 1) == filterCount">
					<span ng-bind="(currentPage - 1) * itemsPerPage + 1"></span>
				</span>
				of
				<span ng-bind="filterCount | number:0"></span>
				<span ng-if="filterCount !== totalCount">
					(<span ng-bind="totalCount | number:0"></span> total)
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-4">
				<div class="input-group">
					<span class="input-group-addon">Results per page</span>
					<select class="form-control" ng-model="itemsPerPage" ng-options="count for count in perPageSelect" ng-change="getList()"></select>
				</div>
			</div>
		</div>
	</div>
@stop
