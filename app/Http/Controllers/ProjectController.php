<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProjectController extends BaseController
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 1);
        
        $projects = Project::query()
            ->where('user_id', $ownerId)
            ->latest()
            ->get();
        
        return view('project', compact('projects'));
    }
}