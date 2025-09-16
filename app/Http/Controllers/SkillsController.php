<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Redirect to home page with anchor to skills section
     */
    public function scrollToSkills()
    {
        return redirect('/#skills');
    }
}