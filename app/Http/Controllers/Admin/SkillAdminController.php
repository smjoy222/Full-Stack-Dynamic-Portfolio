<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillAdminController extends Controller
{
    public function index()
    {
        // Use the authenticated user's ID if available
        $userId = auth()->id();
        if (!$userId) {
            // If not authenticated, get the first user as a fallback
            $firstUser = \App\Models\User::first();
            $userId = $firstUser ? $firstUser->id : 1;
        }
        
        $items = Skill::where('user_id', $userId)->latest()->paginate(12);
        return view('admin.skills.index', compact('items'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:technical,professional',
            'level' => 'required|integer|min:0|max:100',
            'logo' => 'nullable|image|max:2048',
        ]);
        
        // Use the authenticated user's ID if available, fallback to the first user in DB
        $userId = auth()->id();
        if (!$userId) {
            $firstUser = \App\Models\User::first();
            $userId = $firstUser ? $firstUser->id : 1;
        }
        $data['user_id'] = $userId;
        
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('skills', 'public');
        }
        Skill::create($data);
        return redirect()->route('skills.index')->with('success', 'Skill created');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:technical,professional',
            'level' => 'required|integer|min:0|max:100',
            'logo' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            if ($skill->logo) {
                Storage::disk('public')->delete($skill->logo);
            }
            $data['logo'] = $request->file('logo')->store('skills', 'public');
        }
        $skill->update($data);
        return redirect()->route('skills.index')->with('success', 'Skill updated');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->logo) {
            Storage::disk('public')->delete($skill->logo);
        }
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill deleted');
    }
}
