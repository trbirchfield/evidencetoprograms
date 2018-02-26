@if ($crumb_count)
	<ol class="breadcrumb">
		@foreach ($crumbs as $i => $crumb)
			@if ($i + 1 < $crumb_count)
				<li><a href="{{ $crumb['url'] }}">{{ $crumb['name'] }}</a></li>
			@else
				<li class="active">{{ $crumb['name'] }}</li>
			@endif
		@endforeach
	</ol>
@endif
