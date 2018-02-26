@extends('client::layouts.default')

@section('content')
	<main class="main" style="padding-top: 30px;">
		<div class="row">
			<div class="columns medium-8 medium-centered">
				<div class="panel callout message text-center">
					<p><strong>404</strong></p>
					<h2>We couldn't find that page.</h2>
					<p>Not to worry! You can use the search field below to begin searching for political candidates by name, position or geographic location (hint: try "president").</p>
					<form name="search" id="404-search" action="/search">
						<div class="row collapse">
							<div class="column small-10 medium-10 large-7 large-offset-2">
								<input type="text" id="404-search-q" name="q" placeholder="Search for political candidates..." />
							</div>
							<div class="column small-2 medium-2 large-1">
								<button class="button tiny expand"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
					Or, if you would like, you can <a href="/">go back to the home page</a>.
				</div>
			</div>
		</div>
	</main>
@endsection
