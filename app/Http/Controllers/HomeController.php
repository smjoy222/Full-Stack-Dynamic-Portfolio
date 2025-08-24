<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 3);

        $skills = Skill::query()
            ->where('user_id', $ownerId)
            ->orderBy('type')
            ->orderBy('name')
            ->get();

    $technicalSkills = $skills->where('type', 'technical')->take(4)->values();
    $softSkills = $skills->where('type', 'soft')->take(4)->values();

        return view('welcome', compact('technicalSkills', 'softSkills'));
    }
}
