<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('tasks.list', ['tasks' => auth()->user()->tasks()->where('is_completed', false)->get()]);
        }
        return view('tasks.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task = Task::find($task->id);
        $task->name = $request->name;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Mark the specified resource as completed in storage.
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
     public function complete(Task $task)
     {
        $task->is_completed = true;
        $task->save();

        return redirect()->route('tasks.index');
     }

     /**
      * Show the page containing the completed tasks
      *
      * @return \Illuminate\Http\Response
      */
     public function completed()
     {
        return view('tasks.completed', ['tasks' => auth()->user()->tasks()->where('is_completed', true)->get()]);
     }

     /**
      * Mark the specified resource as incomplete in storage.
      * @param \App\Models\Task $task
      * @return \Illuminate\Http\Response
      */
     public function resume(Task $task)
     {
        $task->is_completed = false;
        $task->save();

        return redirect()->route('tasks.completed');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->id);

        return redirect()->back()->with('message', 'Task deleted successfully!');;
    }
}
