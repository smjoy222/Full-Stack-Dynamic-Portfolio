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
                // Create object with safe properties
                $expObj = new \stdClass();
                $expObj->id = $exp->id;
                $expObj->position = $exp->designation;
                $expObj->company = $exp->organization;
                $expObj->location = 'Remote'; // Default value
                
                // Try to access location field but don't fail if it doesn't exist
                try {
                    if (isset($exp->location)) {
                        $expObj->location = $exp->location;
                    }
                } catch (\Exception $e) {
                    // Do nothing, use the default value
                }
                
                $expObj->description = $exp->description ?? '';
                $expObj->from_date = $exp->from_date;
                $expObj->to_date = $exp->to_date;
                $expObj->type = $exp->type;
                
                return $expObj;
            });
        
        return view('experience', compact('experiences'));
    }
}