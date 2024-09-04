<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    private $authenticated_user;

    public function __construct()
    {
        $this->authenticated_user = Auth::user();
    }

    public function index()
    {
        return view('admin.profile.index', [
            'user' => $this->authenticated_user
        ]);
    }

    public function picture(Request $request)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg,webp'],
        ]);

        $target_directory = 'template/photos/';

        if ($this->authenticated_user->picture && File::exists($target_directory . $this->authenticated_user->picture)) {
            unlink($target_directory . $this->authenticated_user->picture);
        }

        $file_name = "Profile-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path($target_directory), $file_name)) {
            $data = [
                'picture' => $file_name,
            ];

            if ($this->authenticated_user->update($data)) {
                return redirect()->back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return redirect()->back()->with(['failure' => 'Unable to upload picture!']);
        }
    }

    public function details(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'cnic' => ['required',  'unique:users,cnic,' . $this->authenticated_user->id]
        ]);

        $data = [
            'name' => $request->name,
            'cnic' => $request->cnic
        ];

        if ($this->authenticated_user->update($data)) {
            return redirect()->back()->with(['success' => "Updated successfully!"]);
        } else {
            return redirect()->back()->with(['failure' => "Oops your data not updated!"]);
        }
    }


    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'current_password' => ['required'],
        ]);

        if (Hash::check($request->current_password, $this->authenticated_user->password)) {
            $data = [
                'password' => $request->password,
            ];

            if ($this->authenticated_user->update($data)) {
                return redirect()->back()->with(['success' => "Your password has been updated."]);
            } else {
                return redirect()->back()->with(['failure' => "Oops, something went wrong!"]);
            }
        } else {
            return redirect()->back()->with(['failure' => "Current password does not match!"]);
        }
    }
}