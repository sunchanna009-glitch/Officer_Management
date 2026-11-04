@extends('layouts.app')
@section('title', 'Edit Officer')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Edit Officer</h2>
    <a href="{{ route('officers.index') }}" class="btn btn-outline-secondary">Back</a>
</div>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
    <form method="POST" action="{{ route('officers.update', $officer) }}">
        @csrf
        @method('PUT')

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Officer Name *</label>
        <input name="name" value="{{ old('name', $officer->name ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Badge Number *</label>
        <input name="badge_number" value="{{ old('badge_number', $officer->badge_number ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Gender *</label>
        <select name="gender" class="form-select" required>
            <option value="">Choose gender</option>
            @foreach(['Male', 'Female', 'Other'] as $gender)
                <option value="{{ $gender }}" @selected(old('gender', $officer->gender ?? '') == $gender)>{{ $gender }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" value="{{ old('dob', isset($officer) && $officer->dob ? $officer->dob->format('Y-m-d') : '') }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Rank *</label>
        <input name="rank" value="{{ old('rank', $officer->rank ?? '') }}" class="form-control" placeholder="e.g. Sergeant" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input name="phone" value="{{ old('phone', $officer->phone ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $officer->email ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Department *</label>
        <select name="department_id" class="form-select" required>
            <option value="">Choose department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" @selected(old('department_id', $officer->department_id ?? '') == $department->id)>{{ $department->department_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Address</label>
        <input name="address" value="{{ old('address', $officer->address ?? '') }}" class="form-control">
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description', $officer->description ?? '') }}</textarea>
    </div>
</div>

        <div class="mt-4">
            <button class="btn btn-primary">Update Officer</button>
            <a href="{{ route('officers.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
</div></div>
@endsection
