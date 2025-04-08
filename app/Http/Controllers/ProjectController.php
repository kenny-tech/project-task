<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('project.index', ['projects' => $projects]);
    }

    public function createForm()
    {
        $projects = Project::get();
        return view('project.create', ['projects' => $projects]);
    }

    public function create(CreateProjectRequest $request)
    {
        $request->validated();
        $data = [
            'name' => $request->name
        ];
        $create_project = Project::create($data);

        if($create_project) {
            $request->session()->flash('message', 'Project created successfully');
            return $this->index();
        }
    }

    public function delete(Request $request, $project_id)
    {
        $delete_project = Project::where('id', $project_id)->delete();
        if($delete_project) {
            $request->session()->flash('message', 'Project deleted successfully');
        } else {
            $request->session()->flash('message', 'Unable to delete project, please try again.');
        }
        return $this->index();
    }

    public function updateForm($project_id)
    {
        $project = Project::where('id', $project_id)->first();
        return view('project.update', ['project' => $project]);
    }

    public function update(UpdateProjectRequest $request)
    {
        $request->validated();

        $project_id = $request->project_id;

        $data = [
            'name' => $request->name
        ];
        $update_project = Project::where('id',$project_id)->update($data);

        if($update_project) {
            $request->session()->flash('message', 'Project successfully updated');
        } else {
            $request->session()->flash('message', 'Unable to update project. Please try again.');
        }

        return $this->index();

    }

}
