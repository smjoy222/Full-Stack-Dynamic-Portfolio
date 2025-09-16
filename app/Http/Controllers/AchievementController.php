<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AchievementController extends BaseController
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 1);
        
        $achievements = Achievement::query()
            ->where('user_id', $ownerId)
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($ach) {
                // Map fields to match our view requirements
                return (object) [
                    'id' => $ach->id,
                    'title' => $ach->name,
                    'issuer' => $ach->organization,
                    'description' => '',  // Not in the model, but handled with empty default
                    'date' => $ach->date,
                    'url' => null, // Not in the model, but handled with null coalescing
                    'type' => $ach->type
                ];
            });
        
        return view('achievement', compact('achievements'));
    }
}