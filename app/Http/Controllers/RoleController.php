<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('role', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roleID' => 'required|integer',
            'role' => 'required|max:255',
        ]);

        Role::create([
            'roleID' => $request->roleID,
            'role' => $request->role,
        ]);

        return redirect()->route('role.create')->with('success', 'Role added successfully.');
    }
}
