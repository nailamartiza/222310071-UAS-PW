<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create()
    {
        $employees = Employee::all();
        $roles = Role::all();
        return view('employe', compact('employees', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|max:255',
            'nip' => 'required|integer'
        ]);

        Employee::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'nip' => $request->nip
        ]);

        return redirect()->route('employe.create')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $roles = Role::all();
        return view('employe_edit', compact('employee', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|max:255',
            'nip' => 'required|integer'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'nip' => $request->nip
        ]);

        return redirect()->route('employe.create')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employe.create')->with('success', 'Employee deleted successfully.');
    }
}
