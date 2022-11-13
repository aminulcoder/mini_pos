<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    public function index()
    {
        $groups = DB::table('groups')->latest()->get();
        //    return $data;
        return view('groups.groups', compact('groups'));
    }

    public function createGroup()
    {

        return view('groups.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ], [
            ' title.required' => 'please enter your title',
        ]);

        Group::create([
            'title' => $request->title,

        ]);
        return redirect()->route('group.list')->with('message', 'successfully data added');
    }

    public function destroy($id)
    {
        Group::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }
}
