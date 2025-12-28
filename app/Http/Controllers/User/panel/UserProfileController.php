<?php

namespace App\Http\Controllers\User\panel;

use App\Http\Controllers\Controller;
use App\Traits\HandlesUserImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    use HandlesUserImages;
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // optional photo
        ]);
        if(isset($request->email)){
            $email = $request->validate([
                'email' => 'email'
            ]);
            $data['email'] = $email['email'];
        }
        //dd(public_path($user->image));
        // Handle photo upload
        if ($request->hasFile('image')) {

            $imagePath = $this->updateUserImage($request->file('image'), $user);

            // store new image
            $data['image'] = $imagePath;

        }

        // Update user
        $user->update($data);


        alert('ویرایش پروفایل','اطلاعات شما با موفقیت ثبت شد','success');

        return back();
    }
}
