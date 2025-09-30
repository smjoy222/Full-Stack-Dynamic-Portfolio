<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        // Get the portfolio owner ID from config
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        
        // Get all skills for the portfolio owner
        $skills = Skill::query()
            ->where('user_id', $ownerId)
            ->orderBy('type')
            ->orderBy('name')
            ->get();

        // Get technical and soft skills
        $technicalSkills = $skills->where('type', 'technical')->values();
        $professionalSkills = $skills->where('type', 'soft')->values();
        
        // Also pass the full skills collection for backward compatibility
        $allSkills = $skills;

        return view('welcome', compact('technicalSkills', 'professionalSkills', 'allSkills'));
    }
}
