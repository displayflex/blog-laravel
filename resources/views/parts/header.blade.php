<!-- Header Wrapper -->
<div id="header-wrapper">
		<div class="container">

			<!-- Header -->
				<header id="header">
					<div class="inner">

						<!-- Logo -->
							<h1><a href="{{ route('site.main.index') }}" id="logo">Laravel Блог</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li @if(Route::currentRouteName() == 'site.main.index') class="current_page_item" @endif>
										<a href="{{ route('site.main.index') }}">Главная</a>
									</li>
									@can('view', App\Models\Feedback::class)
										<li @if(Route::currentRouteName() == 'site.main.feedback') class="current_page_item" @endif>
											<a href="{{ route('site.main.feedback') }}">Написать мне</a>
										</li>
									@endcan
									<li>
										<a href="#">Dropdown</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Lorem ipsum dolor</a></li>
													<li><a href="#">Phasellus consequat</a></li>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>
									<li><a href="#">Right Sidebar</a></li>
								</ul>
							</nav>

					</div>
				</header>

		</div>
	</div><!-- /Header Wrapper -->
