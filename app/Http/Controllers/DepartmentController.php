<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('officers')
            ->orderBy('department_name')->paginate(10);

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'department_name' => ['required', 'string', 'max:255', 'unique:departments,department_name'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Department::create($data);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'department_name' => ['required', 'string', 'max:255', Rule::unique('departments', 'department_name')->ignore($department->id)],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $department->update($data);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        if ($department->officers()->exists()) {
            return back()->with('error', 'Cannot delete a department while officers are assigned to it.');
        }

        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
