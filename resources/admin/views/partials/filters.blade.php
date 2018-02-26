@if (View::hasSection('filters'))
	<div class="well filters">
		<form name="filterForm" ng-submit="applyFilters()" autocomplete="off" novalidate>
			@yield('filters')
			<div class="form-group">
				<button type="submit" class="btn btn-default" ng-disabled="isEmpty(filterFormData)">
					<i class="fa fa-filter"></i>
					<span ng-if="!filtersActive">Apply filters</span>
					<span ng-if="filtersActive" ng-cloak>Update filters</span>
				</button>
				<a class="btn btn-danger" ng-if="filtersActive" ng-click="clearFilters()" ng-cloak>
					<i class="fa fa-times-circle"></i>
					Clear filters
				</a>
			</div>
		</form>
	</div>
@endif
