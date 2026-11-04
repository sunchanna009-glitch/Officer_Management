@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dashboard</h2>
        <p class="text-muted mb-0">Overview of officers and departments</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Officers</p>
                        <h3 class="fw-bold mb-0">{{ $officerCount }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                        <i class="bi bi-person-badge fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Departments</p>
                        <h3 class="fw-bold mb-0">{{ $departmentCount }}</h3>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                        <i class="bi bi-building fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Recent Officers</h4>
            <a href="{{ route('officers.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>

        @if($latestOfficers->isEmpty())
            <div class="text-center text-muted py-4">No officers available yet.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Badge No.</th>
                            <th>Rank</th>
                            <th>Department</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestOfficers as $officer)
                            <tr>
                                <td class="fw-semibold">{{ $officer->name }}</td>
                                <td>{{ $officer->badge_number }}</td>
                                <td>{{ $officer->rank }}</td>
                                <td>{{ $officer->department?->department_name ?? 'Unassigned' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('officers.show', $officer) }}" class="btn btn-sm btn-outline-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
