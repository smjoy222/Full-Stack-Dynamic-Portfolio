<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementAdminController extends Controller
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $items = Achievement::where('user_id', $ownerId)->latest('date')->paginate(12);
        return view('admin.achievements.index', compact('items'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:award,certification,recognition',
            'certification' => 'nullable|string|max:255',
            'organization' => 'required|string|max:255',
            'date' => 'required|date',
            'category' => 'required|string|in:academic,professional,other',
            'images.*' => 'image|max:4096',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        if ($request->hasFile('images')) {
            $stored = [];
            foreach ($request->file('images') as $img) {
                $stored[] = $img->store('achievements', 'public');
            }
            $data['images'] = $stored;
        }
        Achievement::create($data);
        return redirect()->route('achievements.index')->with('success', 'Achievement created');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:award,certification,recognition',
            'certification' => 'nullable|string|max:255',
            'organization' => 'required|string|max:255',
            'date' => 'required|date',
            'category' => 'required|string|in:academic,professional,other',
            'images.*' => 'image|max:4096',
        ]);
        if ($request->hasFile('images')) {
            $existing = $achievement->images ?? [];
            foreach ($request->file('images') as $img) {
                $existing[] = $img->store('achievements', 'public');
            }
            $data['images'] = $existing;
        }
        $achievement->update($data);
        return redirect()->route('achievements.index')->with('success', 'Achievement updated');
    }

    public function destroy(Achievement $achievement)
    {
        if (is_array($achievement->images)) {
            foreach ($achievement->images as $p) {
                Storage::disk('public')->delete($p);
            }
        }
        $achievement->delete();
        return redirect()->route('achievements.index')->with('success', 'Achievement deleted');
    }
}
