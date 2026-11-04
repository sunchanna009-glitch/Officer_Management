@extends('layouts.app')
@section('title', 'Add Department')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Add Department</h2>
    <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">Back</a>
</div>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form method="POST" action="{{ route('departments.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Department Name *</label>
        <input name="department_name" value="{{ old('department_name', $department->department_name ?? '') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Location</label>
        <input name="location" value="{{ old('location', $department->location ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description', $department->description ?? '') }}</textarea>
    </div>
    <button class="btn btn-primary">Save Department</button>
    <a href="{{ route('departments.index') }}" class="btn btn-light">Cancel</a>
</form>
</div></div>
@endsection
