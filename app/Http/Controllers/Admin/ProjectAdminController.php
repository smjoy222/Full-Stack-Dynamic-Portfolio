<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectAdminController extends Controller
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $items = Project::where('user_id', $ownerId)->latest()->paginate(12);
        return view('admin.projects.index', compact('items'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'type' => 'nullable|string|max:100',
            'reference' => 'nullable|string|max:255',
            'tools' => 'nullable|array',
            'tools.*' => 'string|max:50',
            'keywords' => 'nullable|array',
            'keywords.*' => 'string|max:50',
            'status' => 'nullable|string|max:50',
            'images.*' => 'image|max:4096',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        // handle images array
        if ($request->hasFile('images')) {
            $stored = [];
            foreach ($request->file('images') as $img) {
                $stored[] = $img->store('projects', 'public');
            }
            $data['images'] = $stored;
        }
        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'Project created');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'type' => 'nullable|string|max:100',
            'reference' => 'nullable|string|max:255',
            'tools' => 'nullable|array',
            'tools.*' => 'string|max:50',
            'keywords' => 'nullable|array',
            'keywords.*' => 'string|max:50',
            'status' => 'nullable|string|max:50',
            'images.*' => 'image|max:4096',
        ]);
        // merge images
        if ($request->hasFile('images')) {
            $existing = $project->images ?? [];
            foreach ($request->file('images') as $img) {
                $existing[] = $img->store('projects', 'public');
            }
            $data['images'] = $existing;
        }
        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Project updated');
    }

    public function destroy(Project $project)
    {
        if (is_array($project->images)) {
            foreach ($project->images as $p) {
                Storage::disk('public')->delete($p);
            }
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted');
    }
}
