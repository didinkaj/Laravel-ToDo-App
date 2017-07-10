@extends('layouts.main')

@section('title', 'Projects page')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="text-center m-t-lg">
				<h1 style="color: green;"> Tasks </h1>
				<small>list of tasks</small>
				@isset($allTasks)
				@foreach($allTasks as $task)
				<p>
					{{$task->body}}
				</p>
				@endforeach
				@endisset

				@isset($taskByID)
				@foreach($taskByID as $task)
				<p>
					{{$task->body}}
				</p>
				@endforeach
				@endisset

			</div>
		</div>
	</div>
</div>
@endsection
