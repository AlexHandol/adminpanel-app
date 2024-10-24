<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function edit(User $user)
    {
        return view('users.view.edit');
    }

    public function update(User $user)
    {
        $validated = request()->validate([
            'username' => 'required|min:3|max:50',
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'phone_number' => 'required|min:3|max:50',
            'email' => 'required|email',
            'profile_image' => 'image'
        ]);

        // dd($validated);

        if (request()->has('profile_image')) {
            $imagePath = request()->file('profile_image')->store('profile', 'public');
            $validated['profile_image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
