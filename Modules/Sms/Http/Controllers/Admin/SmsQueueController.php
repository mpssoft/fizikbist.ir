<?php

namespace Modules\Sms\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Sms\Models\SmsQueue; // assuming your module model namespace
use App\Models\User;
use App\Models\Group;
use App\Http\Controllers\Controller;

class SmsQueueController extends Controller
{
    // List all SMS queues
    public function index()
    {
        $queues = SmsQueue::with(['user','group','message_template'])->get();


        return view('sms::admin.queues.index', compact('queues'));
    }

    // Show form to create a new SMS queue
    public function create()
    {
        $users = User::all();
        $groups = Group::all();
        return view('sms::admin.queues.create', compact('users', 'groups'));
    }

    // Store a new SMS queue
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:singleuser,group,all',
            'user_id' => 'nullable|exists:users,id',
            'group_id' => 'nullable|exists:groups,id',
            'message_template_id' => 'nullable|integer',
            'message' => 'nullable|string',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
        ]);

        SmsQueue::create($data);

        return redirect()->route('admin.sms_queues.index')->with('success', 'SMS Queue created.');
    }

    // Show edit form
    public function edit(SmsQueue $smsQueue)
    {
        $users = User::all();
        $groups = Group::all();
        return view('sms::admin.queues.edit', compact('smsQueue', 'users', 'groups'));
    }

    // Update SMS queue
    public function update(Request $request, SmsQueue $smsQueue)
    {
        $data = $request->validate([
            'type' => 'required|in:singleuser,group,all',
            'user_id' => 'nullable|exists:users,id',
            'group_id' => 'nullable|exists:groups,id',
            'message_template_id' => 'nullable|integer',
            'message' => 'nullable|string',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',

        ]);

        $smsQueue->update($data);

        return redirect()->route('admin.sms_queues.index')->with('success', 'SMS Queue updated.');
    }

    // Delete SMS queue
    public function destroy(SmsQueue $smsQueue)
    {
        $smsQueue->delete();
        return redirect()->route('sms.queues.index')->with('success', 'SMS Queue deleted.');
    }
}
