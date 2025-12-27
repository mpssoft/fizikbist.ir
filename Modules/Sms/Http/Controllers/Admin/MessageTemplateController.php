<?php

namespace Modules\Sms\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Sms\Models\MessageTemplate;
use Illuminate\Http\Request;

class MessageTemplateController extends Controller
{
    public function index()
    {
        $templates =  MessageTemplate::all();

        return view('sms::admin.message_templates.index',compact('templates'));
    }
    public function create()
    {
        return view('sms::admin.message_templates.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'nullable|string',
            'bodyId' => 'required|integer',
        ]);
       /* preg_match_all('/{([\w\.]+)}/', $validated['message'], $matches);
        $placeholders = $matches[1]; // only inside content without {}
        dd(implode(";",$placeholders));*/
        MessageTemplate::create($validated);

        return redirect()->route('admin.message_templates.index');
    }

    public function show(MessageTemplate $messageTemplate)
    {
        return $messageTemplate;
    }
    public function edit(MessageTemplate $messageTemplate)
    {
        return view('sms::admin.message_templates.edit',compact('messageTemplate'));
    }
    public function update(Request $request, MessageTemplate $messageTemplate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'nullable|string',
            'bodyId' => 'required|integer',
        ]);

        $messageTemplate->update($validated);

         return redirect()->route('admin.message_templates.index');
    }

    public function destroy(MessageTemplate $messageTemplate)
    {
        $messageTemplate->delete();

        return redirect()->route('admin.message_templates.index');
    }
}
