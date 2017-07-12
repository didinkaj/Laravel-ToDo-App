<?php

namespace taskSystem\Http\Controllers\TaskAndFollowUp;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use taskSystem\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use taskSystem\Task;
use Session;


class TaskController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

		$this -> middleware('auth');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$allTasks =  Task::latest() -> orderBy('created_at', 'desc') -> get();
		return view('/taskandfollowup/tasks',compact('allTasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		 return view('taskandfollowup.tasks');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		   $validator = Validator::make($request->all(), [
            'body' => 'required|max:255|string',
            'department' => 'required',
        ]);

        if ($validator->fails()) {
        	session::flash('error', 'Task Creation failed, please try again');
            return redirect('/tasks')
                        ->withErrors($validator)
                        ->withInput();
        }else{
        	$save =Task::create([
        				'body' => $request->input(['body']),
        				 'user_id'=>Auth::user()->id,
        				 'email'=>Auth::user()->email,
        				 'department' => $request->input(['department']),
        				 'access' => $request->input(['access'])
        				]);
			// redirect
			if($save){
            session::flash('success', 'Task Created Successfully ');
            return redirect('/tasks');
			}else{
			session::flash('error', 'Error Task not saved, try again!');
            return redirect('/tasks');
			}
        }
		
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
		$taskByID = Task::where('id',$id)->get();
		return view('/taskandfollowup/tasks',compact('taskByID'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		$delete = Task::destroy($id);
		if($delete){
			session::flash('success', 'Successfully deleted task!');
            return redirect('/tasks');
		}else{
			session::flash('error', 'Deletion failed, please try again');
            return redirect('/tasks');
		}
	}

}
