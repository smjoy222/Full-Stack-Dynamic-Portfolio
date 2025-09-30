<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ExperienceController extends BaseController
{
    public function index()
    {
        $ownerId = (int) config('portfolio.owner_user_id', 1);
        
        $experiences = Experience::query()
            ->where('user_id', $ownerId)
            ->orderBy('from_date', 'desc')
            ->get()
            ->map(function ($exp) {
                // Map fields to match our view requirements
                return (object) [
                    'id' => $exp->id,
                    'position' => $exp->designation,
                    'company' => $exp->organization,
                    'location' => null, // Not in the model, but handled with null coalescing in the view
                    'description' => $exp->description ?? '',  // Use the description field from the model or empty default
                    'from_date' => $exp->from_date,
                    'to_date' => $exp->to_date,
                    'type' => $exp->type
                ];
            });
        
        return view('experience', compact('experiences'));
    }
}