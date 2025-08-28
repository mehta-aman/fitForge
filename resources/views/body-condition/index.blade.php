@extends('layouts.user')

@section('title', 'Body Condition Dashboard')
@section('header', 'Body Condition')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-white">Current Body Condition</h4>
                <div>
                    <a href="{{ route('body-condition.edit') }}" class="btn btn-primary mr-3">Update Condition</a>
                    <form action="{{ route('body-condition.reset') }}" method="POST" onsubmit="return confirm('Are you sure you want to reset all your body condition data? This action cannot be undone.');" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Reset Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($latestMeasurement)
    <div class="row">
        <div class="col-md-3">
            <div class="card fitforge-glow-card">
                <div class="card-body text-center">
                    <h5 class="card-title text-white">Weight</h5>
                    <p class="card-text display-4 text-white">{{ $latestMeasurement->weight }} kg</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card fitforge-glow-card">
                <div class="card-body text-center">
                    <h5 class="card-title text-white">Height</h5>
                    <p class="card-text display-4 text-white">{{ $latestMeasurement->height }} cm</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card fitforge-glow-card">
                <div class="card-body text-center">
                    <h5 class="card-title text-white">Body Fat</h5>
                    <p class="card-text display-4 text-white">{{ $latestMeasurement->body_fat_percentage ?? 'N/A' }} %</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card fitforge-glow-card">
                <div class="card-body text-center">
                    <h5 class="card-title text-white">Muscle Mass</h5>
                    <p class="card-text display-4 text-white">{{ $latestMeasurement->muscle_mass ?? 'N/A' }} kg</p>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center text-white">
        <p>No measurement data found. Please update your body condition.</p>
    </div>
    @endif

    <div class="row mt-4">
        <div class="col-lg-12">
            <h4 class="text-white">Progress Stats</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card fitforge-glow-card">
                <div class="card-body">
                    <h5 class="card-title text-white">Weight Progress</h5>
                    <canvas id="weightChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fitforge-glow-card">
                <div class="card-body">
                    <h5 class="card-title text-white">Body Fat Progress</h5>
                    <canvas id="bodyFatChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fitforge-glow-card">
                <div class="card-body">
                    <h5 class="card-title text-white">Muscle Mass Progress</h5>
                    <canvas id="muscleMassChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <h4 class="text-white">History Logs</h4>
            <div class="card fitforge-glow-card fitforge-history-card">
                <div class="card-body p-0">
                    <table class="table mb-0 fitforge-history-table">
                        <thead>
                            <tr>
                                <th class="fitforge-history-th">Date</th>
                                <th class="fitforge-history-th">Weight</th>
                                <th class="fitforge-history-th">Height</th>
                                <th class="fitforge-history-th">Body Fat %</th>
                                <th class="fitforge-history-th">Muscle Mass</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($measurementHistory as $measurement)
                            <tr>
                                <td class="fitforge-history-date">{{ $measurement->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">{{ $measurement->weight }} kg</td>
                                <td class="text-center">{{ $measurement->height }} cm</td>
                                <td class="text-center">{{ $measurement->body_fat_percentage ?? 'N/A' }}</td>
                                <td class="text-center">{{ $measurement->muscle_mass ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center py-3">
                        {{ $measurementHistory->links('vendor.pagination.dark') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .fitforge-glow-card {
        background: rgba(20, 20, 40, 0.95) !important;
        border: none;
        border-radius: 1.2rem;
        box-shadow: 0 0 32px 0 rgba(108,99,255,0.18), 0 2px 16px 0 rgba(0,201,167,0.10);
        margin-bottom: 2rem;
        transition: box-shadow 0.3s;
    }
    .fitforge-glow-card:hover {
        box-shadow: 0 0 25px 8px #6C63FF, 0 2px 24px 0 #00C9A7;
    }
    .btn-primary {
        background: linear-gradient(90deg, #6C63FF 60%, #00C9A7 100%) !important;
        border: none !important;
        border-radius: 2rem !important;
        font-weight: 600;
        box-shadow: 0 0 8px #6C63FF55 !important;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #00C9A7 0%, #6C63FF 100%) !important;
        box-shadow: 0 0 16px #00C9A7 !important;
    }
    .btn-danger {
        background: #ff4b5c !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #ff4b5c55 !important;
        border-radius: 2rem !important;
    }
    .btn-danger:hover {
        box-shadow: 0 0 16px #ff4b5c !important;
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
        font-size: 1.15em;
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
        font-size: 1.08em;
        vertical-align: middle;
        padding-top: 1em;
        padding-bottom: 1em;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartOptions = {
            scales: {
                y: {
                    ticks: { color: '#bdbdd7' },
                    grid: { color: '#23234a' }
                },
                x: {
                    ticks: { color: '#bdbdd7' },
                    grid: { color: '#23234a' }
                }
            },
            plugins: {
                legend: {
                    labels: { color: '#fff' }
                }
            }
        };

        const weightCtx = document.getElementById('weightChart').getContext('2d');
        new Chart(weightCtx, {
            type: 'line',
            data: {
                labels: @json($progressData['weight']['labels'] ?? []),
                datasets: [{
                    label: 'Weight (kg)',
                    data: @json($progressData['weight']['values'] ?? []),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });

        const bodyFatCtx = document.getElementById('bodyFatChart').getContext('2d');
        new Chart(bodyFatCtx, {
            type: 'line',
            data: {
                labels: @json($progressData['body_fat_percentage']['labels'] ?? []),
                datasets: [{
                    label: 'Body Fat (%)',
                    data: @json($progressData['body_fat_percentage']['values'] ?? []),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });

        const muscleMassCtx = document.getElementById('muscleMassChart').getContext('2d');
        new Chart(muscleMassCtx, {
            type: 'line',
            data: {
                labels: @json($progressData['muscle_mass']['labels'] ?? []),
                datasets: [{
                    label: 'Muscle Mass (kg)',
                    data: @json($progressData['muscle_mass']['values'] ?? []),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });
    });
</script>
@endpush 