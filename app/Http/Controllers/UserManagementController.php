<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use FFI;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\avatar\dpUpdate;

class UserManagementController extends Controller
{
    public function view(User $user)
    {
        // dd($profile_picture);

        return view('modules.user-management.view', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'profile_picture.required' => 'Please select a profile picture.',
            'profile_picture.image' => 'Please select a valid image.',
            'profile_picture.mimes' => 'Image must be in jpeg, png, jpg, gif, svg format.',
            'profile_picture.max' => 'Image miust be less than 2MB.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $profile_picture = time() . '.' . $request->profile_picture->getClientOriginalExtension();
        $request->profile_picture->move(public_path('uploads/'), $profile_picture);

        $user->profile_picture = $profile_picture;
        $user->save();

        return back()->with('success', 'profile_picture updated successfully.');
    }


    public function updateInfo(Request $request, User $user)
    {
        $user->user_name = $request->input('user_name');
        $user->school_id = $request->input('school_id');
        $user->name = $request->input('name');
        $user->sorsu_email = $request->input('sorsu_email');
        $user->bdate = $request->input('bdate');
        $user->phone_no = $request->input('phone_no');
        $user->save();

        return back()->with('success', 'User Info updated successfully.');
    }

    public function updatePassword(Request $request, User $user)
    {

        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');

        // dd($oldPassword, $newPassword, $confirmPassword);

        if (!empty($newPassword) && !empty($confirmPassword) && $newPassword === $confirmPassword) {
            if (Hash::check($oldPassword, $user->password)) {
                $user->password = Hash::make($newPassword);
                $user->save();
            } else {
                return back()->with('error', 'Old password is incorrect.');
            }
        } else {
            return back()->with('error', 'New password and confirm password does not match.');
        }


        return back()->with('success', 'Password updated successfully.');
    }
}
