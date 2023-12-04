<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getMyProfile()
    {
        return view('admin.my-profile');
    }

    public function update(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ($request->has('image')) {
            $data['image'] = saveFiles($request->image, 'user-profiles');
        }
        auth()->user()->update($data);

        return json_encode([
            'error' => false,
            'message' => 'Profile updated successfully'
        ]);
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'min:8']
        ]);

        if ($validated) {
            if (Hash::check($request->old_password, auth()->user()->password)) {
                if ($request->new_password == $request->confirm_password) {
                    auth()->user()->update([
                        'password' => Hash::make($request->new_password)
                    ]);

                    return json_encode([
                        'error' => false,
                        'message' => 'Password updated successfully'
                    ]);
                } else {
                    return json_encode([
                        'error' => true,
                        'message' => 'New Password and Old Password not matched'
                    ]);
                }
            } else {
                return json_encode([
                    'error' => true,
                    'message' => 'Incorrect Old Password'
                ]);
            }
        }
    }
}
