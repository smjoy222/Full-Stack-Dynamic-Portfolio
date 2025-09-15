<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalDetail;
use Illuminate\Http\Request;

class PersonalDetailAdminController extends Controller
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $items = PersonalDetail::where('user_id', $ownerId)->paginate(10);
        return view('admin.personal_details.index', compact('items'));
    }

    public function create()
    {
        return view('admin.personal_details.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'nullable|string',
            'blood_group' => 'nullable|string|max:10',
            'department' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:0|max:200',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        PersonalDetail::create($data);
        return redirect()->route('personal_details.index')->with('success', 'Personal details saved');
    }

    public function edit(PersonalDetail $personal_detail)
    {
        return view('admin.personal_details.edit', ['personalDetail' => $personal_detail]);
    }

    public function update(Request $request, PersonalDetail $personal_detail)
    {
        $data = $request->validate([
            'description' => 'nullable|string',
            'blood_group' => 'nullable|string|max:10',
            'department' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:0|max:200',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
        ]);
        $personal_detail->update($data);
        return redirect()->route('personal_details.index')->with('success', 'Personal details updated');
    }

    public function destroy(PersonalDetail $personal_detail)
    {
        $personal_detail->delete();
        return redirect()->route('personal_details.index')->with('success', 'Personal details deleted');
    }
}
