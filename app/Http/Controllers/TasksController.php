<?php

namespace App\Http\Controllers;

use App\Models\Tasks; // Make sure to import the Task model if it exists
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::all(); // Retrieve all tasks from the database
        return view('tasks.index', compact('tasks')); // Pass the tasks data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create'); // Return the view for creating a new task
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new task record in the database
        Tasks::create($request->all());

        // Redirect the user back to the task index page
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {
        return view('tasks.show', compact('task')); // Pass the task data to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        return view('tasks.edit', compact('task')); // Pass the task data to the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the task record in the database
        $task->update($request->all());

        // Redirect the user back to the task index page
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        // Delete the task record from the database
        $task->delete();

        // Redirect the user back to the task index page
        return redirect()->route('tasks.index');
    }
}
