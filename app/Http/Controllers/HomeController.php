<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 1); // Updated to use the current admin user ID

        $skills = Skill::query()
            ->where('user_id', $ownerId)
            ->orderBy('type')
            ->orderBy('name')
            ->get();

        // Use the correct skill types that we set in the migration and forms
        $technicalSkills = $skills->where('type', 'technical')->take(4)->values();
        $professionalSkills = $skills->where('type', 'professional')->take(4)->values();
        
        // Also pass the full skills collection for backward compatibility
        $allSkills = $skills;

        return view('welcome', compact('technicalSkills', 'professionalSkills', 'allSkills'));
    }
}
