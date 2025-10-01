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
            'location' => 'nullable|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        
        try {
            // Create the experience record - if the location field doesn't exist,
            // this will fail silently and we'll still have the record created
            Experience::create($data);
        } catch (\Exception $e) {
            // If there was an error with the location field, try again without it
            if (strpos($e->getMessage(), 'location') !== false) {
                unset($data['location']);
                Experience::create($data);
            } else {
                // Re-throw if it's not related to the location field
                throw $e;
            }
        }
        
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
            'location' => 'nullable|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);
        
        try {
            // Update the experience record
            $experience->update($data);
        } catch (\Exception $e) {
            // If there was an error with the location field, try again without it
            if (strpos($e->getMessage(), 'location') !== false) {
                unset($data['location']);
                $experience->update($data);
            } else {
                // Re-throw if it's not related to the location field
                throw $e;
            }
        }
        
        return redirect()->route('experiences.index')->with('success', 'Experience updated');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted');
    }
}
