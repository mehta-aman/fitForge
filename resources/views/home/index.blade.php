@extends('layouts.user')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box fitforge-glow-card" style="background:rgba(108,99,255,0.7)!important;">
            <div class="inner">
                <h3>{{ $workoutsCount ?? 0 }}</h3>
                <p>Workouts</p>
            </div>
            <div class="icon">
                <i class="fas fa-dumbbell"></i>
            </div>
            <a href="{{ route('workouts.index') }}" class="small-box-footer" style="color:#fff !important;">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="small-box fitforge-glow-card" style="background:rgba(0,201,167,0.7)!important;">
            <div class="inner">
                <h3>{{ $goalsCount ?? 0 }}</h3>
                <p>Goals</p>
            </div>
            <div class="icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <a href="{{ route('goals.index') }}" class="small-box-footer" style="color:#fff !important;">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="small-box fitforge-glow-card" style="background:rgba(255,165,0,0.7)!important;">
            <div class="inner">
                <h3>{{ $streaksCount ?? 0 }}</h3>
                <p>Current Streak</p>
            </div>
            <div class="icon">
                <i class="fas fa-fire"></i>
            </div>
            <a href="{{ route('streaks.index') }}" class="small-box-footer" style="color:#fff !important;">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="small-box fitforge-glow-card" style="background:rgba(255,75,92,0.7)!important;">
            <div class="inner">
                <h3>{{ $remindersCount ?? 0 }}</h3>
                <p>Reminders</p>
            </div>
            <div class="icon">
                <i class="fas fa-bell"></i>
            </div>
            <a href="{{ route('reminders.index') }}" class="small-box-footer" style="color:#fff !important;">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card fitforge-glow-card p-4">
            <h4 class="mb-3" style="color:#6C63FF;">Recent Workouts</h4>
            @if(isset($recentWorkouts) && count($recentWorkouts) > 0)
                <div class="table-responsive">
                    <table class="table table-dark table-hover table-borderless mb-0 fitforge-table">
                        <thead>
                            <tr style="color:#00C9A7;">
                                <th>Date</th>
                                <th>Workout</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentWorkouts as $workout)
                                <tr>
                                    <td>{{ $workout->created_at->format('M d, Y') }}</td>
                                    <td>{{ $workout->title }}</td>
                                    <td>{{ $workout->duration }} min</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">No recent workouts found.</p>
            @endif
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card fitforge-glow-card p-4">
            <h4 class="mb-3" style="color:#6C63FF;">Progress Overview</h4>
            @if(isset($progressData) && count($progressData) > 0)
                <div class="chart">
                    <canvas id="progressChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            @else
                <p class="text-muted">No progress data available.</p>
            @endif
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
.small-box {
    border-radius: 1.2rem;
    box-shadow: 0 0 20px rgba(108,99,255,0.2);
    color: #fff !important;
}
.small-box .icon {
    color: rgba(255,255,255,0.3) !important;
}
.fitforge-table th, .fitforge-table td {
    vertical-align: middle;
}
.table-dark th {
    border-bottom: 1px solid #6C63FF !important;
}
.table-hover tbody tr:hover {
    background-color: rgba(108,99,255,0.1) !important;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('progressChart');
    if (ctx) {
        var progressChart = new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: {!! isset($progressData) ? json_encode($progressData->pluck('date')) : '[]' !!},
                datasets: [{
                    label: 'Progress',
                    data: {!! isset($progressData) ? json_encode($progressData->pluck('value')) : '[]' !!},
                    borderColor: '#00C9A7',
                    backgroundColor: 'rgba(0,201,167,0.2)',
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#6C63FF',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#6C63FF',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(108,99,255,0.1)'
                        },
                        ticks: {
                            color: '#bdbdd7'
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(108,99,255,0.1)'
                        },
                        ticks: {
                            color: '#bdbdd7'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#f9f9f9'
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush