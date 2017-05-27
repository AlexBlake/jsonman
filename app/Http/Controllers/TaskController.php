<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Template;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('task.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::all();
        return view('task.create', [ 'templates' => $templates ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        if(!$task)
        {
            return redirect()->action('TaskController@index')->with("flash", "Failed");
        }
        return redirect()->action('TaskController@index')->with("flash", "Success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $task = Task::findOrfail($id);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            abort(404, 'The resource you are looking for could not be found');
        }
        $templates = Template::all();

        return view('task.edit', [ 'task' => $task, 'templates' => $templates ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $task = Task::findOrfail($id);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            abort(404, 'The resource you are looking for could not be found');
        }

        $task->update($request->all());

        return redirect()->action('TaskController@index')->with("flash", "Success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
