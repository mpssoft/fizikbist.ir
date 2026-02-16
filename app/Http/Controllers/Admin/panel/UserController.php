<?php

namespace App\Http\Controllers\Admin\panel;


use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        $users = User::paginate(20); // paginate 20 per page
        return view('admin.users.index', compact('users'));
    }

    // Show a single user
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Show edit form
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'image' => 'nullable',
            'role' => 'required|in:admin,user',
            'mobile' => 'required|unique:users,mobile,'.$user->id,

        ]);
        if(isset($request->email))
            $validated = array_merge ($validated,$request->validate([
                'email' => 'nullable|email|unique:users,email,'.$user->id,
            ]));

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
    public function showMessages(Message $message)
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

    public function search(Request $request)
    {
        $data = $request->validate(
            [
                'query' => 'required'
            ]
        );
        $users = User::where('name', 'like', "%{$data['query']}%")->get();

        return response()->json(['users'=>$users]);
    }
}
