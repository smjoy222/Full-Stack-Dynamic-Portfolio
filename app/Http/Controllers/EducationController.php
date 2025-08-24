<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class EducationController extends BaseController
{
    public function index()
    {
        // Use configured portfolio owner (defaults to 3) and fall back if missing
        $ownerId = (int) config('portfolio.owner_user_id', 3);
        $user = User::find($ownerId) ?? User::first();
        $userId = optional($user)->id;

        $educations = Education::when($userId, fn ($q) => $q->where('user_id', $userId))
            ->orderByDesc('enrolled_year')
            ->get();

        return view('edu', compact('educations', 'user'));
    }
}
