<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Example user</strong> </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span> </span> </a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li>
							<a href="#">Logout</a>
						</li>
					</ul>
				</div>
				<div class="logo-element">
					TS
				</div>
			</li>
			<li class="{{ isActiveRoute('main') }}" >
				<a href="{{ url('/') }}"><i class="fa fa-th-large fa-2x"></i> <br/><span class="nav-label">Dashboard</span></a>
			</li>
			<li class="{{ isActiveRoute('projects') }}">
				<a href="#"><i class="fa fa-th-large fa-2x"></i> <span class="nav-label">Projects</span> </a>
			</li>
			<li class="{{ isActiveRoute('myProjects') }}">
				<a href="#"><i class="fa fa-th-large fa-2x"></i> <span class="nav-label">My Projects</span> </a>
			</li>
			<li class="{{ isActiveRoute('issues') }}">
				<a href="#"><i class="fa fa-th-large fa-2x"></i> <span class="nav-label">Issues</span> </a>
			</li>
			<li class="{{ isActiveRoute('userBoards') }}">
				<a href="#"><i class="fa fa-th-large fa-2x"></i> <span class="nav-label">User Boards</span> </a>
			</li>
			<li class="{{ isActiveRoute('taskFollowUp') }}">
				<a href="#"><i class="fa fa-th-large fa-2x"></i> <span class="nav-label">Task and Follow Up</span> </a>
			</li>
		</ul>

	</div>
</nav>
