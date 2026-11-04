@extends('layouts.app')
@section('title', 'Officers')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div><h2 class="fw-bold mb-1">Officers</h2><p class="text-muted mb-0">Manage officer information</p></div>
    <a href="{{ route('officers.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Officer</a>
</div>
<form method="GET" class="card card-body border-0 shadow-sm mb-3">
    <div class="row g-2">
        <div class="col-md-6">
            <input name="search" value="{{ request('search') }}" class="form-control" placeholder="Search officer name...">
        </div>
        <div class="col-md-4">
            <select name="department_id" class="form-select">
                <option value="">All Departments</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" @selected(request('department_id') == $department->id)>{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-grid"><button class="btn btn-dark">Search / Filter</button></div>
    </div>
</form>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light"><tr><th>#</th><th>Name</th><th>Badge No.</th><th>Rank</th><th>Gender</th><th>Department</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            @forelse($officers as $officer)
                <tr>
                    <td>{{ $officers->firstItem() + $loop->index }}</td>
                    <td class="fw-semibold">{{ $officer->name }}</td>
                    <td>{{ $officer->badge_number }}</td>
                    <td>{{ $officer->rank }}</td>
                    <td>{{ $officer->gender }}</td>
                    <td>{{ $officer->department->department_name }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('officers.show', $officer) }}" class="btn btn-sm btn-outline-info">View</a>
                        <a href="{{ route('officers.edit', $officer) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('officers.destroy', $officer) }}" class="d-inline" onsubmit="return confirm('Delete this officer?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted py-4">No officers found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $officers->links() }}</div>
</div>
@endsection
