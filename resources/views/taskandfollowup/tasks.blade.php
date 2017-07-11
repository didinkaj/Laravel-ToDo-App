@extends('layouts.main')

@section('title', 'Projects ')

@section('styles')

@parent
<!-- FooTable -->
<link href="{!! asset('css/plugins/footable/footable.core.css') !!}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper white-bg border-bottom page-heading">
	<div class="col-lg-10">
		<h1 style="color: green;"> Project Management </h1>
		<ol class="breadcrumb">
			<li>
				<a>Task & Follow Up</a>
			</li>
			<li class="active">
				<a>Tasks</a>
			</li>

		</ol>

	</div>
	<div class="col-lg-2">
		<h1></h1>
		<a class="minimalize-styl-2 btn btn-success " data-toggle="modal" data-target="#myModal" href="#"> <i class="fa fa-suitcase"></i>
		<br/>
		Create Task</a>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="app">

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>All Tasks </h5>

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
							@isset($allTasks)
							@foreach($allTasks as $task)
							<tr class="gradeX">
								<td class="center">{{$task->id}}</td>
								<td>{{ucfirst($task->body)}} </td>
								<td></td>
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
							@endisset

							@isset($taskByID)
							@foreach($taskByID as $task)
							<tr class="gradeX">
								<td class="center">{{$task->id}}</td>
								<td>{{$task->body}} </td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
								<form method="POST" action="/deletetasks/{{$task->id}}">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button type="submit"   class="btn  " style="background-color: red;color: #ffffff;">
									<i class="fa fa-trash-o"></i></button>
								</form></td>
							</tr>
							@endforeach
							@endisset

						</tbody>
						<tfoot>
							<tr>
								<td colspan="11"><ul class="pagination pull-right"></ul></td>
							</tr>
						</tfoot>
					</table>
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
						<input type="text" placeholder="Enter task name" name="body" class="form-control">
						@if ($errors->has('body'))
						<span class="help-block"> <strong>{{ $errors->first('body') }}</strong> </span>
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
@endsection

@section('scripts')

@parent
<!-- FooTable -->
<script src="{{ asset('js/plugins/footable/footable.all.min.js') }}"></script>
<!-- Page-Level Scripts -->
<script>
	$(document).ready(function() {

		$('.footable').footable();
		$('.footable2').footable();

	});

</script>
@endsection
