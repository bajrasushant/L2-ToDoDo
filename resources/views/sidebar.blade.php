<aside class="sidebar-container">
			<div class="sidebar">
				<header>
					<!--TODO: make the top a hamburger menu-->
					<div class="top">
						<div class="logo">
							<img src="/img/wave-wallpaper.png" alt="ToDoDo-logo">
							<div class="sidebar-text"><h2>ToDODO</h2></div>
						</div>
					</div>

					<i class="sidebar-collapser toggle">
						<span class="material-icons-sharp icon">chevron_left</span>
					</i>
				</header>

				<a href="#" class="active">
					<span class="material-icons-sharp icon">grid_view</span>
					<div class="sidebar-text"><h3>Dashboard</h3></div>
				</a>

				<a href="{{ route('todo') }}">
					<span class="material-icons-sharp icon">view_week</span>
					<div class="sidebar-text"><h3>Board</h3></div>
				</a>

				<a href="#">
					<span class="material-icons-sharp icon">format_list_bulleted</span>
					<div class="sidebar-text"><h3>Projects</h3></div>
				</a>

				<a href="#">
					<span class="material-icons-sharp icon">date_range</span>
					<div class="sidebar-text"><h3>Calendar</h3></div>
				</a>

				<a href="#">
					<span class="material-icons-sharp icon">settings</span>
					<div class="sidebar-text"><h3>Settings</h3></div>
				</a>

				<a href="#">
					<span class="material-icons-sharp icon">logout</span>
					<div class="sidebar-text"><h3>Logout</h3></div>
				</a>
			</div>

		</aside>
