<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoAdminController extends Controller
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $items = Info::where('user_id', $ownerId)->paginate(10);
        return view('admin.infos.index', compact('items'));
    }

    public function create()
    {
        return view('admin.infos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'portfolio' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
        ]);
        $data['user_id'] = (int) config('portfolio.owner_user_id', 3);
        Info::create($data);
        return redirect()->route('infos.index')->with('success', 'Info saved');
    }

    public function edit(Info $info)
    {
        return view('admin.infos.edit', compact('info'));
    }

    public function update(Request $request, Info $info)
    {
        $data = $request->validate([
            'portfolio' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
        ]);
        $info->update($data);
        return redirect()->route('infos.index')->with('success', 'Info updated');
    }

    public function destroy(Info $info)
    {
        $info->delete();
        return redirect()->route('infos.index')->with('success', 'Info deleted');
    }
}
