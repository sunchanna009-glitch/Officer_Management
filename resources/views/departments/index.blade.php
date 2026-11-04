@extends('layouts.app')
@section('title', 'Departments')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div><h2 class="fw-bold mb-1">Departments</h2><p class="text-muted mb-0">Manage officer departments</p></div>
    <a href="{{ route('departments.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Department</a>
</div>
<div class="card border-0 shadow-sm"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
    <thead class="table-light"><tr><th>#</th><th>Department</th><th>Location</th><th>Officers</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
    @forelse($departments as $department)
        <tr>
            <td>{{ $departments->firstItem() + $loop->index }}</td>
            <td class="fw-semibold">{{ $department->department_name }}</td>
            <td>{{ $department->location ?? '-' }}</td>
            <td>{{ $department->officers_count }}</td>
            <td class="text-end text-nowrap">
                <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="POST" action="{{ route('departments.destroy', $department) }}" class="d-inline" onsubmit="return confirm('Delete this department?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center text-muted py-4">No departments found.</td></tr>
    @endforelse
    </tbody>
</table>
</div><div class="card-body">{{ $departments->links() }}</div></div>
@endsection
