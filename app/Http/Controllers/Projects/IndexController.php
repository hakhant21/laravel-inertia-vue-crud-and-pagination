<?php

namespace App\Http\Controllers\Projects;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectResource;

class IndexController extends Controller
{
    public function __invoke()
    {
        $projects = Project::with('user')->paginate(10)->withQueryString();

        return Inertia::render('Projects/Index',[
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:users',
            'name' => 'required',
            'slug' => 'nullable',
            'description' => 'nullable',
            'content' => 'required',
            'image' => 'nullable'
        ]);

        Project::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : ''
        ]);

        return to_route('projects.index')->with('message', 'New project has been created successfully...');
    }

    public function edit(Project $project)
    {
         return Inertia::render('Projects/Edit', [
            'project' => $project
         ]);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|unique:users',
            'name' => 'required',
            'slug' => 'nullable',
            'description' => 'nullable',
            'content' => 'required',
            'image' => 'nullable'
        ]);

        $project->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : ''
        ]);

        return to_route('projects.index')->with('message', 'Your project has been updated successfully...');
    }

    public function delete(Project $project)
    {
        $project->delete();

        return to_route('projects.index')->with('message', 'Your project has been deleted successfully...');
    }
}
