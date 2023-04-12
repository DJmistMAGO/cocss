<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserManagementController extends Controller
{
    public function view(User $userId)
    {
        $profilePictureUrl = null;

        if ($userId->profile_picture) {
            $profilePictureUrl = Storage::url($userId->profile_picture);
        } else {
            $profilePictureUrl = asset('uploads/default_profile_picture.png');
        }

        return view('modules.user-management.view', compact('userId', 'profilePictureUrl'));
    }

    public function updateProfile(Request $request, User $userId)
    {
        $request->validate([
            'profile_picture' => 'required|image',
        ]);

        $profile_picture = time() . '.' . $request->profile_picture->getClientOriginalExtension();
        $request->profile_picture->move(public_path('uploads/'), $profile_picture);

        Auth()->user()->update(['profile_picture' => $profile_picture]);

        return back()->with('success', 'profile_picture updated successfully.');
    }
}
