<?php

namespace Modules\Conversation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Conversation\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::orderBy('id','desc')->take(300)->get()->sortBy('id');

        return view('conversation::index', compact('conversations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);


        Conversation::create([
            'user_id'   => auth()->id(),
            'body'      => $request->body,
            'parent_id' => $request->parent_id ?? null,
        ]);

        return back()->with('success', 'Message sent');
    }

    // Send new message
    public function send(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $message = Conversation::create([
            'user_id' => auth()->id(), // who sends
            'body' => $request->body,
            'seen' => 0,
            'parent_id' => $request->parentId ?? null,
        ]);

        return $this->fetchUnseen($request);
    }

    // Fetch unseen messages
    public function fetchUnseen(Request $request)
    {
        $lastId = $request->get('lastId', 0);

        $messages = Conversation::where('id', '>', $lastId)
            ->with('parent','user')->get();

        return response()->json($messages);
    }

    public function clear()
    {
        Conversation::truncate();
        return response()->json(['ok'=> true,'message'=>'مکالمات با موفقیت پاک شد']);
    }
}
