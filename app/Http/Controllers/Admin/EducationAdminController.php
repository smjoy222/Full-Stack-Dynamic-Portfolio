<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationAdminController extends Controller
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $items = Education::where('user_id', $ownerId)->latest()->paginate(10);
        return view('admin.education.index', compact('items'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'institute' => 'required|string|max:255',
            'enrolled_year' => 'nullable|string|max:10',
            'passing_year' => 'nullable|string|max:10',
            'grade' => 'nullable|string|max:50',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        Education::create($data);
        return redirect()->route('education.index')->with('success', 'Education created');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $data = $request->validate([
            'type' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'institute' => 'required|string|max:255',
            'enrolled_year' => 'nullable|string|max:10',
            'passing_year' => 'nullable|string|max:10',
            'grade' => 'nullable|string|max:50',
        ]);
        $education->update($data);
        return redirect()->route('education.index')->with('success', 'Education updated');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('education.index')->with('success', 'Education deleted');
    }
}
