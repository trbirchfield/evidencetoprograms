<!--[if lt IE 8]>
		<div class="old-browser">It looks like your browser is outdated. This site is best viewed in the latest versions of<br />Internet Explorer, Google Chrome, Firefox or Safari. Please <a href="http://browsehappy.com/" target="_blank">update your browser</a> for the optimal experience.</div>
<![endif]-->
<header>
	<div class="row">
		<div class="column small-12">
			@if (Request::segment(1) == NULL or Request::segment(1) == 'home')
				<svg width="300" height="80" class="logo no-print">
					<image xlink:href="{{ asset_path('img/logo.svg') }}" src="{{ asset_path('img/logo.png') }}" width="300" height="80" />
				</svg>
			@else
				<a class="home-link" href="{{ route('home') }}"></a>
				<a class="logo no-print" href="{{ route('home') }}">
					<svg width="169" height="50">
						<image xlink:href="{{ asset_path('img/logo_small.svg') }}" src="{{ asset_path('img/logo_small.png') }}" width="169" height="50" alt="Logo"/>
					</svg>
				</a>
			@endif
			<img class="logo no-screen" src="{{ asset_path('img/logo_small.png') }}" alt="Logo" />
			<nav>
				<ul class="menu {!! (Request::segment(1) == NULL or Request::segment(1) == 'home') ? 'home-menu' : '' !!}">
					<li><a href="{{ route('programs') }}">Featured Programs</a></li>
					<li><a href="{{ route('faq') }}">FAQ</a></li>
					<li><a href="{{ route('about') }}">About Us</a></li>
					<li><a href="{{ route('contact') }}">Contact Us</a></li>
					<li class="search">
						<form class="search-form" method="get" action="{{ route('search') }}">
							<input type="search" name="search" class="search-input" placeholder="Search the Site" />
							<button class="search-submit"><i class="fa fa-search"></i></button>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
