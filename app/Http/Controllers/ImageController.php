<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function updateProfile(ImageRequest $request)
    {
        $user = $request->user();

        if ($request->hasFile('image')) {

            // delete avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar->path);
                $user->avatar->delete();
            }

            $originalFileName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->store('avatar', 'public');

            $user->avatar()->create([
                'name' => $originalFileName,
                'path' => $path,
            ]);

            return Redirect::route('profile.edit')->with('status', 'avatar-updated');
        } else {
            return Redirect::route('profile.edit')->with('status', 'update-failed');
        }
    }
}
