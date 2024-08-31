<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index',   compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            "title" => 'required',
            "description" => 'required',
            "url" => 'required',
            "image" => '',
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        } else {
            auth()->user()->profile->update(
                $data
            );
        }

        // dd($data);


        return redirect("/profile/{$user->id}");
    }
}
