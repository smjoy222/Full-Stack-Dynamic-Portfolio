<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        
        // Get statistics
        $stats = [
            'projects' => Project::where('user_id', $user->id)->count(),
            'skills' => Skill::where('user_id', $user->id)->count(),
            'education' => Education::where('user_id', $user->id)->count(),
            'experiences' => Experience::where('user_id', $user->id)->count(),
            'achievements' => Achievement::where('user_id', $user->id)->count(),
        ];
        
        // Recent items
        $recentProjects = Project::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();
            
        $recentSkills = Skill::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentSkills', 'user'));
    }
}
