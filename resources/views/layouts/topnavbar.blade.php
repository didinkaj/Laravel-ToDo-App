<div class="row border-bottom">
	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0; ">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
			<form role="search" class="navbar-form-custom" method="post" action="/">
				<div class="form-group">
					<div class="input-group">
						<input type="text" placeholder="Search ..." class="form-control" name="top-search" id="top-search" />

					</div>
				</div>
			</form>
		</div>
		<div class="pull-right">
		<ul class="nav navbar-top-links navbar-right">
			<li>
				<span class="m-r-sm text-muted welcome-message animated bounce" > Tasks Coordination, Management & Follow ups. </span>
			</li>
			<li>
				<a href="{{ route('logout') }}" style="color: green;"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out fa-1x"></i> <strong>Log out </strong></a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>

		</ul>
		</div>
	</nav>
</div>
