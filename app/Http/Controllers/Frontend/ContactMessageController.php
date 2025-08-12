<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'nullable|email|max:255',
            'grade'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:50',
            'message' => 'required|string',
        ]);


        ContactMessage::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'پیام شما با موفقیت ثبت شد.',
        ]);

    }
}
