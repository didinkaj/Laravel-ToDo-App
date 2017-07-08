<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<span> </span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><h3>Task System</h3></strong> </span> 
						<span class="text-muted text-xs block">@if(!Auth::guest())<?php $pieces = explode(" ",Auth::user()->name); ?>{{ ucfirst($pieces[0]) }}@endif <b class="caret"></b></span> </span> </a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li>
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Log out </a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
				<div class="logo-element">
					TS
				</div>
			</li>
			<li class="{{ isActiveRoute('dashboard') }} {{ isActiveRoute('home') }}" >
				<a href="{{ url('/home') }}" class="text-center"><i class="fa fa-desktop fa-2x"></i>
				<br/>
				<span class="nav-label">Dashboard</span></a>
			</li>
			<li class="{{ isActiveRoute('projects') }}">
				<a href="{{url('/projects')}}" class="text-center"><i class="fa fa-th-large fa-2x"></i>
				<br/>
				<span class="nav-label">Projects</span> </a>
			</li>
			<li class="{{ isActiveRoute('myprojects') }}">
				<a href="{{ url('/myprojects') }}" class="text-center"><i class="fa fa-suitcase fa-2x"></i>
				<br/>
				<span class="nav-label">My Projects</span> </a>
			</li>
			<li class="{{ isActiveRoute('issues') }}">
				<a href="{{ url('/issues') }}" class="text-center"><i class="fa fa-warning fa-2x"></i>
				<br/>
				<span class="nav-label">Issues</span> </a>
			</li>
			<li class="{{ isActiveRoute('userboards') }}">
				<a href="{{url('/userboards')}}" class="text-center"><i class="fa fa-window-maximize fa-2x"></i>
				<br/>
				<span class="nav-label">User Boards</span> </a>
			</li>
			<li class="{{ isActiveRoute('tasks') }} {{ isActiveRoute('taskfollowupuserboards') }}">
				<a href="#" class="text-center"><i class="fa fa-align-justify fa-2x " style="align:center;"></i> <span class="fa arrow fa-2x "></span>
				<br/>
				<span class="nav-label">Task & Follow Up</span> </a>
				<ul class="nav nav-second-level collapse">
					<li class="{{ isActiveRoute('tasks') }}">
						<a href="{{url('/tasks')}}">Tasks</a>
					</li>
					<li class="{{ isActiveRoute('taskfollowupuserboards') }}">
						<a href="{{url('/taskfollowupuserboards')}}">User Boards</a>
					</li>
				</ul>
			</li>

		</ul>

	</div>
</nav>
