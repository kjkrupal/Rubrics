<nav>
	<ul>
		<li><a href="{{ URL::route('home') }}"> Home </a></li>
		
		@if(Auth::check())

		@else
		<li><a href="{{ URL::route('account-create') }}"> Create Account </a></li>
		@endif
	</ul>
</nav>