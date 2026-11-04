@extends('layouts.app')
@section('title', 'Officer Details')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Officer Details</h2>
    <div>
        <a href="{{ route('officers.edit', $officer) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('officers.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
    <div class="row g-3">
        @foreach([
            'Officer Name' => $officer->name,
            'Badge Number' => $officer->badge_number,
            'Gender' => $officer->gender,
            'Date of Birth' => $officer->dob?->format('d M Y') ?? '-',
            'Rank' => $officer->rank,
            'Phone' => $officer->phone ?? '-',
            'Email' => $officer->email ?? '-',
            'Department' => $officer->department->department_name,
            'Address' => $officer->address ?? '-',
            'Description' => $officer->description ?? '-',
        ] as $label => $value)
            <div class="col-md-6"><div class="text-muted small">{{ $label }}</div><div class="fw-semibold">{{ $value }}</div></div>
        @endforeach
    </div>
</div></div>
@endsection
