@extends('layouts.main')

@section('title', 'Projects ')

@section('styles')

@parent
<!-- FooTable -->
<link href="{!! asset('css/plugins/footable/footable.core.css') !!}" rel="stylesheet">
<link href="{!! asset('css/plugins/select2/select2.min.css') !!}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper white-bg border-bottom page-heading">
	<div class="col-lg-10">
		<h1 style="color: green;"> Project Management </h1>
		<ol class="breadcrumb">
			<li>
				<a href="/tasks">Task & Follow Up</a>
			</li>
			<li class="active">
				<a>Tasks</a>
			</li>

		</ol>

	</div>
	<div class="col-lg-2">
		<h1></h1>
		<a class="minimalize-styl-2 btn btn-success " id="task" data-toggle="modal" data-target="#myModal" href="#"> <i class="fa fa-suitcase"></i>
		<br/>
		Create Task</a>
	</div>
</div>
@if(!empty(Session::get('error')) && Session::get('error') == 5)
<script>
	$(document).ready(function() {

		$('#myModal').modal('show');

	}); 
</script>
@endif

<div class="wrapper wrapper-content animated fadeInRight" id="app">

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					@isset($allTasks)
					<h5>All Tasks </h5>
					@endisset

					@isset($taskByID)
					<h5> Tasks Details</h5>
					@endisset

					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-wrench"></i> </a>
						<ul class="dropdown-menu dropdown-user">
							<li>
								<a href="#">Config option 1</a>
							</li>
							<li>
								<a href="#">Config option 2</a>
							</li>
						</ul>
						<a class="close-link"> <i class="fa fa-times"></i> </a>
					</div>
				</div>

				<div class="ibox-content">
					@if (Session::has('success'))
					<span class="alert alert-success alert-dismissable col-md-12"> <strong>{{ Session::get('success') }}</strong>
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">
							×
						</button></span>
					@endif
					@if (Session::has('error'))
					<span class="alert alert-danger alert-dismissable col-md-12"> <strong>{{ Session::get('error') }}</strong>
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">
							×
						</button></span>
					@endif

					@isset($allTasks)
					<div class="input-group m-b placeholodercolor">
						<input type="text" class="form-control input-sm m-b-xs " id="filter" placeholder="Search in table">
						<span class="input-group-addon btn-success"><i class="fa fa-search " style="color: #0E9AEF;"></i></span>
					</div>

					<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
						<thead>
							<tr>
								<th>Task Key</th>
								<th>Task Name</th>
								<th data-hide="phone,tablet">Task Type</th>
								<th data-hide="phone,tablet">Priority</th>
								<th data-hide="phone,tablet"> Status</th>
								<th>% Done</th>
								<th data-hide="phone,tablet">Created By</th>
								<th data-hide="phone,tablet">Assigned To</th>
								<th data-hide="phone,tablet">Due Date</th>
								<th data-hide="phone,tablet">Comments</th>
								<th data-hide="phone,tablet">View</th>
							</tr>
						</thead>
						<tbody>

							@foreach($allTasks as $task)
							<tr class="gradeX">
								<td class="center">{{$task->id}}</td>
								<td>{{ucfirst($task->body)}} </td>
								<td>{{ucfirst($task->access)}}</td>
								<td></td>
								<td class="center"><span class="pie" style="display: none;">4,9</span>
								<svg class="peity" height="16" width="16">
									<path d="M 8 8 L 8 0 A 8 8 0 0 1 15.48012994148332 10.836839096340286 Z" fill="#1ab394"></path><path d="M 8 8 L 15.48012994148332 10.836839096340286 A 8 8 0 1 1 7.999999999999998 0 Z" fill="#d7d7d7"></path>
								</svg></td>
								<td class="center">20%</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="center"><a  href="/tasks/{{$task->id}}" class="btn  " style="background-color: green;color: #ffffff;"><i class="fa fa-folder-open"></i> More</a></td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<td colspan="11"><ul class="pagination pull-right"></ul></td>
							</tr>
						</tfoot>
					</table>
					@endisset

					@isset($taskByID)
					@foreach($taskByID as $task)

					<div class="row">
						<div class="col-lg-12">
							<div class="m-b-md">

								<form method="POST" action="/deletetasks/{{$task->id}}" class="pull-right">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button type="submit"   class="btn  " style="background-color: red;color: #ffffff;">
										<i class="fa fa-trash-o"></i>
									</button>
								</form>&nbsp;&nbsp;

								<!--<a href="#" class="btn btn-white btn-xs pull-right">Edit project</a>-->
								<h2 style="float: left;">{{$task->body}}</h2>
							</div>
							<dl class="dl-horizontal">
								<dt>
									Status:
								</dt>
								<dd>
									<span class="label label" style="color: #ffffff;background-color: green;">Active</span>
								</dd>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5">
							<dl class="dl-horizontal">

								<dt>
									Created by:
								</dt>
								<dd>
									{{Auth::user()->name}}
								</dd>
								<dt>
									Department:
								</dt>
								<dd>
									{{$task->department}}
								</dd>
								<dt>
									Priority:
								</dt>
								<dd>
									<a href="#" class="text-navy"> High</a>
								</dd>
								<dt>
									Task Id:
								</dt>
								<dd>
									{{$task->id}}
								</dd>
							</dl>
						</div>
						<div class="col-lg-7" id="cluster_info">
							<dl class="dl-horizontal">

								<dt>
									Last Updated:
								</dt>
								<dd>
									{{$task->updated_at->diffForHumans()}}
								</dd>
								<dt>
									Created:
								</dt>
								<dd>
									{{$task->created_at->diffForHumans()}}
								</dd>
								<dt>
									Participants:
								</dt>
								<dd class="project-people">
									<a href=""><i class="fa fa-user"></i></a>
									<a href=""><i class="fa fa-user"></i></a>
									<a href=""><i class="fa fa-user"></i></a>
									<a href=""><i class="fa fa-user"></i></a>
									<a href=""><i class="fa fa-user"></i></a>
								</dd>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<dl class="dl-horizontal">
								<dt>
									Completed:
								</dt>
								<dd>
									<div class="progress progress-striped active m-b-sm" >
										<div style="width: 50%;" style="color: #ffffff;background-color: green;" class="progress-bar"></div>
									</div>
									<small>Project completed in <strong>50%</strong>. Remaining close the project</small>
								</dd>
							</dl>
						</div>
					</div>
					<div class="row m-t-sm">
						<div class="col-lg-12">
							<div class="panel blank-panel">
								<div class="panel-heading">
									<div class="panel-options">
										<ul class="nav nav-tabs">
											<li class="">
												<a href="#tab-1" data-toggle="tab" aria-expanded="false">Participants Comments</a>
											</li>
											<li class="active">
												<a href="#tab-2" data-toggle="tab" aria-expanded="true">Last activity</a>
											</li>
										</ul>
									</div>
								</div>

								<div class="panel-body">

									<div class="tab-content">
										<div class="tab-pane" id="tab-1">
											<div class="feed-activity-list">
												<div class="feed-element">
													<a href="#" class="pull-left"> <i class="fa fa-image"></i> </a>
													<div class="media-body ">
														<small class="pull-right">{{$task->created_at->diffForHumans()}}</small>
														<strong>{{Auth::user()->name}}</strong> posted message on <strong>{{Auth::user()->name}}</strong> project.
														<br>
														<small class="text-muted">{{$task->created_at}} - {{$task->updated_at}}</small>
														<div class="well">
															{{$task->body}}
														</div>
													</div>
												</div>
												<div class="feed-element">
													<a href="#" class="pull-left"> <i class="fa fa-image"></i> </a>
													<div class="media-body ">
														<small class="pull-right">2h ago</small>
														<strong>{{Auth::user()->name}}</strong> add 1 photo on <strong>{{$task->name}}</strong>project.
														<br>
														<small class="text-muted">{{$task->created_at->diffForHumans()}} </small>
													</div>
												</div>

											</div>

										</div>
										<div class="tab-pane active" id="tab-2">

											<table class="table table-striped">
												<thead>
													<tr>
														<th>Status</th>
														<th>Title</th>
														<th>Start Time</th>
														<th>End Time</th>
														<th>Comments</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span class="label " style="color: #ffffff;background-color: green;" ><i class="fa fa-check"></i> Completed</span></td>
														<td> {{$task->body}} </td>
														<td> {{$task->created_at}}</td>
														<td> {{$task->updated_at}}</td>
														<td>
														<p class="small">
															{{$task->body}}
														</p></td>

													</tr>

													<tr>
														<td><span class="label " style="color: #ffffff;background-color: green;" ><i class="fa fa-check"></i> Completed</span></td>
														<td> {{$task->body}} </td>
														<td> {{$task->created_at}}</td>
														<td> {{$task->updated_at}}</td>
														<td>
														<p class="small">
															{{$task->body}}
														</p></td>

													</tr>
													<tr>
														<td><span class="label " style="color: #ffffff;background-color: green;" ><i class="fa fa-check"></i> Completed</span></td>
														<td> {{$task->body}} </td>
														<td> {{$task->created_at}}</td>
														<td> {{$task->updated_at}}</td>
														<td>
														<p class="small">
															{{$task->body}}
														</p></td>

													</tr>

												</tbody>
											</table>

										</div>
									</div>

								</div>

							</div>
						</div>
					</div>

					@endforeach
					@endisset
				</div>
			</div>
		</div>
	</div>

</div>

<!-- modal window -->
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInRight">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<i class="fa fa-suitcase modal-icon"></i>
				<h4 class="modal-title">Create Task</h4>
				<small class="font-bold">Department > Select Task > Access</small>
			</div>
			<form method="post" action="/createtasks">
				<div class="modal-body">

					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
						<label for="body">Task Name</label>
						<input type="text" placeholder="Enter task name" name="body" value="{{old('body')}}" class="form-control">
						@if ($errors->has('body'))
						<span class="help-block"> <strong>{{ $errors->first('body') }}</strong> </span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('department') ? ' has-error' : '' }}">
						<label for="department">Department</label>

						<select class=" form-control" name="department" required>
							<option></option>
							<option value="Finance" {{ (old("department") == "Finance" ? "selected":"") }}>Finance</option>
							<option value="IT" {{ (old("department") == "IT" ? "selected":"") }}>IT</option>
							<option value="Research" {{ (old("department") == "Research" ? "selected":"") }}>Research</option>
						</select>
						@if ($errors->has('department'))
						<span class="help-block"> <strong>{{ $errors->first('department') }}</strong> </span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('access') ? ' has-error' : '' }}">
						<label for="access">Access</label>

						<select class=" form-control" name="access" required>
							<option></option>
							<option value="All" {{ (old("access") == "All" ? "selected":"") }}>All</option>
							<option value="Private" {{ (old("access") == "Private" ? "selected":"") }}>Private</option>
							<option value="Public" {{ (old("access") == "Public" ? "selected":"") }}>Public</option>
						</select>
						@if ($errors->has('access'))
						<span class="help-block"> <strong>{{ $errors->first('access') }}</strong> </span>
						@endif
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">
						Cancel
					</button>
					<input type="submit" class="btn btn-primary " value="Submit"/>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end of modal window -->
<!--modol erro -->

@endsection

@section('scripts')

@parent
<!-- FooTable -->
<script src="{{ asset('js/plugins/footable/footable.all.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
<!-- Page-Level Scripts -->
<script>
	$(document).ready(function() {

		$('.footable').footable();
		$('.footable2').footable();

	});
	$(".select2_demo_1").select2();
	$(".select2_demo_2").select2();
	$(".select2_demo_3").select2({
		placeholder : "Select a state",
		allowClear : true
	});

</script>
@endsection
