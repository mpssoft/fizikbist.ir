<?php

namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMessageController extends Controller
{
    // List messages for current user
    public function index()
    {
        $messages = Message::where('parent_id',null)
                            ->where(function ($query) {
                                $query->where('receiver_id', Auth::id())
                                    ->OrWhere('sender_id', Auth::id());
                                    })
                            ->orderByDesc('created_at')
                            ->with('sender')
                            ->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    // Show create form
    public function create(?User $user=null)
    {
        //$users = User::all();
        return view('admin.messages.create',compact('user'));
    }

    // Store new message
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'subject'     => 'nullable|string|max:255',
            'body'        => 'required|string',
        ]);

        Message::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'subject'     => $request->subject,
            'body'        => $request->body,
        ]);

        return redirect()->route('admin.messages.index')
            ->with('success', 'پیام با موفقیت ارسال شد');
    }

    // Show single message
    public function show(Message $message)
    {
       // $this->authorize('view', $message);

        if (!$message->is_read && $message->receiver_id === Auth::id()) {
            $message->update(['is_read' => true]);
        }
        $message->replies()->where('receiver_id',Auth::id())->update([
            'is_read'=>1
        ]);
        return view('admin.messages.show', compact('message'));
    }

    // Delete
    public function destroy(Message $message)
    {
        //$this->authorize('delete', $message);

        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'پیام حذف شد');
    }

    public function markAsRead(Message $message)
    {
        if (!$message->is_read && $message->receiver_id === Auth::id()) {
            $message->update(['is_read' => true]);
        }
        $message->replies()->where('receiver_id',Auth::id())->update([
            'is_read'=>1
        ]);

        return back();
    }
    public function reply(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string|max:5000',
        ]);

        $original = Message::findOrFail($id);

        $reply = Message::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $original->sender_id ?? $original->receiver_id, // reply back to who sent
            'subject'     => $original->subject, // keep same subject
            'body'        => $request->body,
            'parent_id'   => $original->id,
        ]);

        return redirect()->back()->with('success', 'Reply sent successfully.');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'subject'    => 'nullable|string|max:255',
            'body' => 'required|string|max:5000',
            'recipients'=>'required'
        ]);

        $recipients = $validated['recipients'];
        $users = collect();

        if ($recipients === '*') {
            // ✅ All users
            $users = User::all()->except(Auth::id());
        } else {
            // ✅ Specific users by email or mobile
            $items = array_map('trim', explode(',', $recipients));

            $users = User::whereIn('email', $items)
                ->orWhereIn('mobile', $items)
                ->get();
        }

        foreach ($users as $user) {
            Message::create([
                'sender_id'   => auth()->id(),
                'receiver_id' => $user->id,
                'subject'     => $request->subject,
                'body'        => $request->body,
                'parent_id'   => null, // new message, not reply
            ]);
        }

        toast('پیام با موفقیت ارسال شد','success','center');
        return redirect()->back()->with('success', 'Reply sent successfully.');
    }


}
