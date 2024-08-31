<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct () 
    {
        $this->Middleware('auth');
    }
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }
}
