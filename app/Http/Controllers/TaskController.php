<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Faker\Generator;
use Illuminate\Http\Client\Response as ClientResponse;
// use Faker\Generator;
// use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nette\Utils\Json;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return(response(Task::all()->jsonSerialize()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        $task=new Task();
        $task->title=$faker->sentence(1);
        $task->priority=$faker->boolean?'low':'high';
        $task->save();

        return response($task->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;

        request()->validate([
            'title' => 'required|string|min:5|max:10',
            'description' => 'required|string|min:10',
            'priority' => 'required',
            'status' => 'required',
            'assignedto' => 'required',
            'duedate' => 'required',
            

        ]);
        
        $task=new Task();
        $task->name=$request->title;
        $task->priority=$request->priority;
        $task->description=$request->description;
        $task->status=$request->status;
        $task->assignedto=$request->assignedto;
        $task->duedate=$request->duedate;
        $task->save();
     

        return response($task->jsonSerialize(), Response::HTTP_CREATED);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
       
        $task->delete();
        
       return response(null, Response::HTTP_OK);
    }
}
