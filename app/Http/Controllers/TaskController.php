<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view('task.index', ['tasks' => $tasks]);
    }

    public function createForm()
    {
        $projects = Project::get();
        return view('task.create', ['projects' => $projects]);
    }

    public function create(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $project_id = $request->project_id;

        if(!$title) {
            $request->session()->flash('message', 'Please enter a title');
        }

        if(!$description) {
            $request->session()->flash('message', 'Please enter a description');
        }

        if(!$project_id) {
            $request->session()->flash('message', 'Please select a project');
        }

        $data = [
            'title' => $title,
            'description' => $description,
            'project_id' => $project_id,
            'status' => 'pendinng'
        ];
        $create_Task = Task::create($data);

        if ($create_Task) {
            $request->session()->flash('message', 'Task created successfully');
            return $this->index();
        }
    }

    public function delete(Request $request, $task_id)
    {
        $delete_project = Task::where('id', $task_id)->delete();
        if($delete_project) {
            $request->session()->flash('message', 'Task deleted successfully');
        } else {
            $request->session()->flash('message', 'Unable to delete task, please try again.');
        }
        return $this->index();
    }

    public function updateForm($task_id)
    {
        $task = Task::where('id', $task_id)->first();
        $projects = Project::get();
        return view('task.update', ['task' => $task, 'projects' => $projects]);
    }

    public function update(UpdateTaskRequest $request)
    {
        $request->validated();

        $task_id = $request->task_id;

        $data = [
            'title' => $title,
            'description' => $description,
            'project_id' => $project_id,
            'status' => 'pendinng'
        ];

        $update_task = Task::where('id',$task_id)->update($data);

        if($update_task) {
            $request->session()->flash('message', 'Task successfully updated');
        } else {
            $request->session()->flash('message', 'Unable to update task. Please try again.');
        }

        return $this->index();

    }

}
