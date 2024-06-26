<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['stringSearch'])){
            $projects = Project::where('title', 'LIKE', '%' . $_GET['stringSearch'] . '%')->get();
            $projects_count = Project::where('title', 'LIKE', '%' . $_GET['stringSearch'] . '%')->count();
        }else{
            $projects = Project::all();
            $projects_count = Project::count();
        }

        return view('admin.projects.index', compact('projects', 'projects_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        $exist = Project::where('title', $request->title)->first();
        if($exist){
            return redirect()->route('admin.projects.create')->with('error', 'Progetto già esistente');
        }else{
            $new_project = new Project();
            $new_project->fill($form_data);
            $new_project->save();

            return redirect()->route('admin.projects.show', $new_project)->with('success', 'Progetto aggiunto correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        $exist = Project::where('title', $request->title)->first();
        if($exist){
            return redirect()->route('admin.projects.edit', $project)->with('error', 'Progetto non modificato perchè già esistente');
        }else{
            $project->update($form_data);
            return redirect()->route('admin.projects.show', $project)->with('success', 'Progetto modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');
    }
}
