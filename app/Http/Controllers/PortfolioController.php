<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\PersonalDetail;
use App\Models\Info;

class PortfolioController extends Controller
{
    // Get the main user (you might want to make this dynamic based on authentication)
    private function getPortfolioUser()
    {
        // For now, get the first user or create a default one
        return User::with(['personalDetail', 'info'])->first() ?? User::create([
            'name' => 'Your Name',
            'email' => 'your.email@example.com',
            'password' => bcrypt('password'),
        ]);
    }

    public function index()
    {
        $user = $this->getPortfolioUser();
        $projects = Project::where('user_id', $user->id)->latest()->take(3)->get();
        $skills = Skill::where('user_id', $user->id)->get();
        
        // Making sure we have technical and professional skills categorized correctly
        $technicalSkills = $skills->where('type', 'technical');
        $professionalSkills = $skills->where('type', 'professional');
        
        // Pass both the full skills collection and the categorized ones
        return view('welcome', compact('user', 'projects', 'skills', 'technicalSkills', 'professionalSkills'));
    }

    public function about()
    {
        $user = $this->getPortfolioUser();
        $education = Education::where('user_id', $user->id)->orderBy('passing_year', 'desc')->get();
        $achievements = Achievement::where('user_id', $user->id)->latest()->get();
        
        return view('about', compact('user', 'education', 'achievements'));
    }

    public function work()
    {
        $user = $this->getPortfolioUser();
        $experiences = Experience::where('user_id', $user->id)
            ->orderBy('from_date', 'desc')
            ->get();
        
        return view('work', compact('user', 'experiences'));
    }

    public function projects()
    {
        $user = $this->getPortfolioUser();
        $projects = Project::where('user_id', $user->id)->latest()->get();
        
        return view('project', compact('user', 'projects'));
    }

    // API Methods for AJAX requests
    public function apiProjects()
    {
        $user = $this->getPortfolioUser();
        $projects = Project::where('user_id', $user->id)->latest()->get();
        
        return response()->json($projects);
    }

    public function apiSkills()
    {
        $user = $this->getPortfolioUser();
        $skills = Skill::where('user_id', $user->id)->get()->groupBy('type');
        
        return response()->json($skills);
    }

    public function apiEducation()
    {
        $user = $this->getPortfolioUser();
        $education = Education::where('user_id', $user->id)->orderBy('passing_year', 'desc')->get();
        
        return response()->json($education);
    }

    public function apiExperiences()
    {
        $user = $this->getPortfolioUser();
        $experiences = Experience::where('user_id', $user->id)
            ->orderBy('from_date', 'desc')
            ->get();
        
        return response()->json($experiences);
    }

    public function apiAchievements()
    {
        $user = $this->getPortfolioUser();
        $achievements = Achievement::where('user_id', $user->id)->latest()->get();
        
        return response()->json($achievements);
    }
}
