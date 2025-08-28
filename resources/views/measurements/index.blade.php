@extends('layouts.user')

@section('title', 'Measurements')
@section('header', 'Measurements')

@section('content')
@php
function kgToLbs($kg) { return $kg !== null ? round($kg * 2.20462, 1) : null; }
function cmToFtIn($cm) {
    if ($cm === null) return null;
    $inches = $cm * 0.393701;
    $ft = floor($inches / 12);
    $in = round($inches - ($ft * 12));
    return "$ft' $in\"";
}
function cmToIn($cm) { return $cm !== null ? round($cm * 0.393701, 1) : null; }
@endphp
<div class="card fitforge-glow-card p-4 mb-4" style="box-shadow:0 0 40px 0 #6C63FF55, 0 2px 24px 0 #00C9A755;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0" style="color:#6C63FF; font-weight:800; letter-spacing:1px; text-shadow:0 2px 12px #6C63FF44;">Current Measurements</h3>
        <div class="d-flex align-items-center">
            <form method="POST" action="{{ route('profile.update', Auth::user()) }}" class="d-inline-block me-3">
                @csrf
                @method('PATCH')
                <select name="unit_preference" class="fitforge-unit-btn d-inline-block w-auto me-3" onchange="this.form.submit()">
                    <option value="metric" @if(Auth::user()->unit_preference == 'metric') selected @endif>Metric (kg, cm)</option>
                    <option value="us" @if(Auth::user()->unit_preference == 'us') selected @endif>US Standard (lbs, ft/in)</option>
                </select>
            </form>
            <a href="{{ route('measurements.create') }}" class="btn btn-primary rounded-pill px-4 shadow" style="font-weight:700; box-shadow:0 0 16px #00C9A7, 0 0 8px #6C63FF55; background:linear-gradient(90deg,#6C63FF 0%,#00C9A7 100%); border:none;">+ Add Measurement</a>
        </div>
    </div>
    <div class="row g-3">
        @php $unit = Auth::user()->unit_preference ?? 'metric'; @endphp
        @php $m = $latestMeasurement; @endphp
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-weight fa-2x mb-2" style="color:#6C63FF;"></i>
                <div class="fw-bold text-white">Weight</div>
                <div class="fs-5" style="color:#00C9A7;">
                    @if($unit == 'us')
                        {{ isset($m->weight) ? kgToLbs($m->weight) : '-' }} <span class="fs-6">lbs</span>
                    @else
                        {{ $m->weight ?? '-' }} <span class="fs-6">kg</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-ruler-horizontal fa-2x mb-2" style="color:#00C9A7;"></i>
                <div class="fw-bold text-white">Waist</div>
                <div class="fs-5" style="color:#6C63FF;">{{ $m->waist_circumference ?? '-' }} <span class="fs-6">cm</span></div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-ruler-combined fa-2x mb-2" style="color:#ff4b5c;"></i>
                <div class="fw-bold text-white">Hip</div>
                <div class="fs-5" style="color:#ff4b5c;">{{ $m->hip_circumference ?? '-' }} <span class="fs-6">cm</span></div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-ruler-vertical fa-2x mb-2" style="color:#FFD700;"></i>
                <div class="fw-bold text-white">Height</div>
                <div class="fs-5" style="color:#FFD700;">
                    @if($unit == 'us')
                        {{ isset($m->height) ? cmToFtIn($m->height) : '-' }}
                    @else
                        {{ $m->height ?? '-' }} <span class="fs-6">cm</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-heartbeat fa-2x mb-2" style="color:#00C9A7;"></i>
                <div class="fw-bold text-white">Body Fat</div>
                <div class="fs-5" style="color:#00C9A7;">{{ $m->body_fat_percentage ?? '-' }} <span class="fs-6">%</span></div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-ruler-horizontal fa-2x mb-2" style="color:#6C63FF;"></i>
                <div class="fw-bold text-white">Chest</div>
                <div class="fs-5" style="color:#6C63FF;">{{ $m->chest_circumference ?? '-' }} <span class="fs-6">cm</span></div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-ruler-horizontal fa-2x mb-2" style="color:#00C9A7;"></i>
                <div class="fw-bold text-white">Shoulder</div>
                <div class="fs-5" style="color:#00C9A7;">{{ $m->shoulder_circumference ?? '-' }} <span class="fs-6">cm</span></div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="fitforge-measure-card text-center p-3">
                <i class="fas fa-ruler-horizontal fa-2x mb-2" style="color:#ff4b5c;"></i>
                <div class="fw-bold text-white">Thigh</div>
                <div class="fs-5" style="color:#ff4b5c;">{{ $m->thigh_circumference ?? '-' }} <span class="fs-6">cm</span></div>
            </div>
        </div>
    </div>
</div>
<div class="card fitforge-glow-card fitforge-history-card p-3 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0" style="color:#00C9A7; font-weight:700;">Measurement History</h4>
    </div>
    <div class="table-responsive">
        <table class="table mb-0 fitforge-history-table">
            <thead>
                <tr>
                    @if(Auth::user() && Auth::user()->role === 'admin')
                        <th class="fitforge-history-th">User</th>
                    @endif
                    <th class="fitforge-history-th">Date</th>
                    <th class="fitforge-history-th">Weight (kg)</th>
                    <th class="fitforge-history-th">Waist (cm)</th>
                    <th class="fitforge-history-th">Hip (cm)</th>
                    <th class="fitforge-history-th">Chest (cm)</th>
                    <th class="fitforge-history-th">Shoulder (cm)</th>
                    <th class="fitforge-history-th">Thigh (cm)</th>
                    <th class="fitforge-history-th">Height (cm)</th>
                    <th class="fitforge-history-th">Body Fat (%)</th>
                    <th class="fitforge-history-th">Muscle Mass (kg)</th>
                    <th class="fitforge-history-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($measurements as $measurement)
                    @php $unit = Auth::user()->unit_preference ?? 'metric'; @endphp
                    <tr>
                        @if(Auth::user() && Auth::user()->role === 'admin')
                            <td class="fitforge-history-date">{{ $measurement->user->name ?? '-' }}</td>
                        @endif
                        <td class="fitforge-history-date">{{ $measurement->date }}</td>
                        <td class="text-center">
                            @if($unit == 'us')
                                {{ isset($measurement->weight) ? kgToLbs($measurement->weight) : '-' }}
                            @else
                                {{ $measurement->weight ?? '-' }}
                            @endif
                        </td>
                        <td class="text-center">{{ $measurement->waist_circumference !== null && $measurement->waist_circumference !== '' ? $measurement->waist_circumference : 'N/A' }}</td>
                        <td class="text-center">{{ $measurement->hip_circumference !== null && $measurement->hip_circumference !== '' ? $measurement->hip_circumference : 'N/A' }}</td>
                        <td class="text-center">{{ $measurement->chest_circumference !== null && $measurement->chest_circumference !== '' ? $measurement->chest_circumference : 'N/A' }}</td>
                        <td class="text-center">{{ $measurement->shoulder_circumference ?? '-' }}</td>
                        <td class="text-center">{{ $measurement->thigh_circumference ?? '-' }}</td>
                        <td class="text-center">
                            @if($unit == 'us')
                                {{ isset($measurement->height) ? cmToFtIn($measurement->height) : '-' }}
                            @else
                                {{ $measurement->height ?? '-' }}
                            @endif
                        </td>
                        <td class="text-center">{{ $measurement->body_fat_percentage ?? '-' }}</td>
                        <td class="text-center">{{ $measurement->muscle_mass ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('measurements.show', $measurement) }}" class="btn btn-info btn-sm rounded-pill mx-1" title="View"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('measurements.edit', $measurement) }}" class="btn btn-warning btn-sm rounded-pill mx-1" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('measurements.destroy', $measurement) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill mx-1" onclick="return confirm('Delete this measurement?')" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="@if(Auth::user() && Auth::user()->role === 'admin') 12 @else 11 @endif" class="text-center text-muted">No measurements found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        {{ $measurements->links('vendor.pagination.dark') }}
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<style>
    .fitforge-glow-card {
        background: rgba(20, 20, 40, 0.97) !important;
        border: none;
        border-radius: 1.2rem;
        box-shadow: 0 0 32px 0 rgba(108,99,255,0.18), 0 2px 16px 0 rgba(0,201,167,0.10);
        margin-bottom: 2rem;
        transition: box-shadow 0.3s;
    }
    .fitforge-glow-card:hover {
        box-shadow: 0 0 25px 8px #6C63FF, 0 2px 24px 0 #00C9A7;
    }
    .fitforge-table th, .fitforge-table td {
        vertical-align: middle;
    }
    .fitforge-measure-card {
        background: linear-gradient(135deg,#23234a 60%,#6C63FF22 100%);
        border-radius: 1rem;
        box-shadow: 0 0 16px #6C63FF33;
        color: #bdbdd7;
        margin-bottom: 1rem;
        min-width: 120px;
    }
    .fitforge-measure-card .fw-bold {
        font-size: 1.1em;
        letter-spacing: 0.5px;
    }
    .fitforge-measure-card .fs-5 {
        font-weight: 700;
    }
    .btn-info {
        background: #00C9A7 !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #00C9A755 !important;
    }
    .btn-warning {
        background: #6C63FF !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #6C63FF55 !important;
    }
    .btn-danger {
        background: #ff4b5c !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #ff4b5c55 !important;
    }
    .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
        opacity: 0.85;
    }
    .btn-primary {
        transition: box-shadow 0.2s, filter 0.2s;
        background: linear-gradient(90deg,#00C9A7 0%,#6C63FF 100%) !important;
        border: none !important;
        font-weight: 700;
    }
    .btn-primary:hover, .btn-primary:focus {
        box-shadow: 0 0 32px 8px #00C9A7AA, 0 0 48px 16px #6C63FF88;
        filter: brightness(1.08);
        outline: none;
    }
    .fitforge-unit-btn {
        background: linear-gradient(90deg,#00C9A7 0%,#6C63FF 100%) !important;
        color: #fff !important;
        border: none !important;
        border-radius: 2rem;
        font-weight: 700;
        padding: 0.4em 1.2em;
        box-shadow: 0 0 8px #00C9A755, 0 0 4px #6C63FF55;
        transition: box-shadow 0.2s, filter 0.2s;
        appearance: none;
        outline: none;
        margin-right: 1rem;
    }
    .fitforge-unit-btn:focus, .fitforge-unit-btn:hover {
        box-shadow: 0 0 12px 2px #00C9A7AA, 0 0 16px 4px #6C63FF88;
        filter: brightness(1.08);
        outline: none;
    }
    .fitforge-history-card {
        background: rgba(20, 20, 40, 0.97) !important;
        border-radius: 1.2rem;
        box-shadow: 0 0 40px 0 #6C63FF55, 0 2px 24px 0 #00C9A755;
        border: none;
        margin-bottom: 2rem;
    }
    .fitforge-history-table {
        background: transparent;
        color: #fff;
        border-radius: 1.2rem;
        overflow: hidden;
        margin-bottom: 0;
    }
    .fitforge-history-table thead tr {
        background: none;
    }
    .fitforge-history-th {
        color: #00C9A7;
        font-weight: 800;
        font-size: 1.05em;
        text-align: center;
        background: none;
        border: none;
        letter-spacing: 1px;
        padding-top: 1.1em;
        padding-bottom: 1.1em;
    }
    .fitforge-history-table tbody tr {
        background: rgba(36, 36, 60, 0.85);
        border-radius: 1.2rem;
        border: none;
        margin-bottom: 0.5em;
        transition: background 0.2s;
    }
    .fitforge-history-table tbody tr:hover {
        background: rgba(108,99,255,0.13);
    }
    .fitforge-history-date {
        color: #6C63FF;
        font-weight: 700;
        text-align: center;
    }
    .fitforge-history-table td {
        border: none;
        text-align: center;
        font-size: 1.02em;
        vertical-align: middle;
        padding-top: 1em;
        padding-bottom: 1em;
    }
</style>
@endpush
