<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OfficerController extends Controller
{
    public function index(Request $request)
    {
        $query = Officer::with('department');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        $officers = $query->latest()->paginate(10)->withQueryString();
        $departments = Department::orderBy('department_name')->get();

        return view('officers.index', compact('officers', 'departments'));
    }

    public function create()
    {
        $departments = Department::orderBy('department_name')->get();
        return view('officers.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'dob' => ['nullable', 'date'],
            'badge_number' => ['required', 'string', 'max:100', 'unique:officers,badge_number'],
            'rank' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'department_id' => ['required', 'exists:departments,id'],
        ]);

        Officer::create($data);

        return redirect()->route('officers.index')->with('success', 'Officer created successfully.');
    }

    public function show(Officer $officer)
    {
        $officer->load('department');
        return view('officers.show', compact('officer'));
    }

    public function edit(Officer $officer)
    {
        $departments = Department::orderBy('department_name')->get();
        return view('officers.edit', compact('officer', 'departments'));
    }

    public function update(Request $request, Officer $officer)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'dob' => ['nullable', 'date'],
            'badge_number' => ['required', 'string', 'max:100', Rule::unique('officers', 'badge_number')->ignore($officer->id)],
            'rank' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'department_id' => ['required', 'exists:departments,id'],
        ]);

        $officer->update($data);

        return redirect()->route('officers.index')->with('success', 'Officer updated successfully.');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect()->route('officers.index')->with('success', 'Officer deleted successfully.');
    }
}
