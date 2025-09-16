<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceAdminController extends Controller
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $items = Experience::where('user_id', $ownerId)->latest('from_date')->paginate(12);
        return view('admin.experiences.index', compact('items'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:job,internship,freelance,volunteer',
            'designation' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        Experience::create($data);
        return redirect()->route('experiences.index')->with('success', 'Experience created');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'type' => 'required|in:job,internship,freelance,volunteer',
            'designation' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
        ]);
        $experience->update($data);
        return redirect()->route('experiences.index')->with('success', 'Experience updated');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted');
    }
}
