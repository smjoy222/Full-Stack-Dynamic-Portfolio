<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        // Get all skills from the database (regardless of user_id for now)
        $skills = Skill::query()
            ->orderBy('type')
            ->orderBy('name')
            ->get();

        // Use the correct skill types that we set in the database (get all skills, no limit)
        $technicalSkills = $skills->where('type', 'technical')->values();
        $professionalSkills = $skills->where('type', 'soft')->values();
        
        // Also pass the full skills collection for backward compatibility
        $allSkills = $skills;

        return view('welcome', compact('technicalSkills', 'professionalSkills', 'allSkills'));
    }
}
