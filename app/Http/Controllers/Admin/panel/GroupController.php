<?php

namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::withCount('users')->get();

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:groups,name',
            'description' => 'nullable|string',
            'icon' => 'required',
            'users' => 'required'
        ]);

        $group = Group::create([
            'name' => $data['name'],
            'icon' => $data['icon'],
            'description' => $data['description'],
        ]);
        $group->users()->attach($data['users']);
        return response()->json(['success'=>true,'message'=>'گروه جدید با موفقیت ایجاد شد']);
    }

    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {

        $data = $request->validate([
            'formData.name' => 'required|string|max:255|unique:groups,name,'.$group->id,
            'formData.icon' => 'required',
            'formData.users' => 'required',
            'formData.description' => 'nullable|string',
        ],[
            'formData.name.unique'=>'نام گروه تکراری است'
        ]);

        $group->update([
            'name' => $data['formData']['name'],
            'icon' => $data['formData']['icon'],
            'description' => $data['formData']['description'],
        ]);
        $group->users()->sync($data['formData']['users']);
        return response()->json(['success'=>true, 'message'=>'گروه  با موفقیت بروزرسانی شد']);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.groups.index')->with('success', 'Group deleted successfully');
    }

    public function manageUsers(Group $group)
    {
        $users = User::all();
        return view('groups.manage-users', compact('group', 'users'));
    }

    public function updateUsers(Request $request, Group $group)
    {
        $group->users()->sync($request->input('users', []));
        return redirect()->route('groups.index')->with('success', 'Group users updated');
    }
}
