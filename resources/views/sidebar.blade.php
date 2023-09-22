<aside class="sidebar-container">
	<div class="sidebar">
		<header>
			<!--TODO: move the logo inside project-info-->
			<div class="top">
				<div class="logo">
					<img src="img/wave-wallpaper.png">
					<div class="sidebar-text"><h2>ToDODO</h2></div>
				</div>
			</div>
			
			<i class="sidebar-collapser toggle rotate">
				<span>
					<svg height="24" width="24"><use href="img/icons.svg#icon-chevron_left"></use></svg>
				</span>
			</i>
		</header>

		<a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
			<span>
				<svg><use href="img/icons.svg#icon-grid_view"></use></svg>
			</span>
			<div class="sidebar-text"><h3>Dashboard</h3></div>
		</a>

		<a href="{{ route('todo') }}" class="{{ request()->routeIs('todo') ? 'active' : '' }}">
			<span>
				<svg><use href="img/icons.svg#icon-view_week"></use></svg>
			</span>
			<div class="sidebar-text"><h3>Board</h3></div>
		</a>

		<a href="#">
			<span>
				<svg><use href="img/icons.svg#icon-format_list_bulleted"></use></svg>
			</span>
			<div class="sidebar-text"><h3>Projects</h3></div>
		</a>

		<a href="#">
			<span>
				<svg><use href="img/icons.svg#icon-date_range"></use></svg>
			</span>
			<div class="sidebar-text"><h3>Calendar</h3></div>
		</a>

		<a href="#">
			<span>
				<svg><use href="img/icons.svg#icon-settings"></use></svg>
			</span>
			<div class="sidebar-text"><h3>Settings</h3></div>
		</a>

		<a href="#">
			<span>
				<svg><use href="img/icons.svg#icon-logout"></use></svg>
			</span>
			<div class="sidebar-text"><h3>Logout</h3></div>
		</a>
	</div>
</aside>