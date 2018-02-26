<nav class="navbar navbar-static-top navbar-default" id="top-nav">
	<div class="container-fluid">
		<div class="navbar-header navbar-left">
			<button type="button" class="sidebar-toggle">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url() }}"><img class="ie-svg" src="/public/img/logo.png" alt="{{ config('site.client.company_name') }}"></a>
		</div>
		<div class="navbar-header navbar-right">
			<ul class="nav navbar-nav">
				<li><a href="{{ route('admin.logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
