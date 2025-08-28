@extends('layouts.user')

@section('title', 'Progress Logs')
@section('header', 'Progress Logs')

@section('content')
<div class="card fitforge-glow-card p-4 mb-4" style="box-shadow:0 0 40px 0 #6C63FF55, 0 2px 24px 0 #00C9A755;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0" style="color:#6C63FF; font-weight:800; letter-spacing:1px; text-shadow:0 2px 12px #6C63FF44;">Progress Overview</h3>
        <a href="{{ route('progress_logs.create') }}" class="btn btn-primary rounded-pill px-4 shadow" style="font-weight:700; box-shadow:0 0 16px #00C9A7, 0 0 8px #6C63FF55; background:linear-gradient(90deg,#6C63FF 0%,#00C9A7 100%); border:none;">+ Add Log</a>
    </div>
    <div class="row g-4">
        <div class="col-md-4 mb-4">
            <div class="card fitforge-glow-card p-3 h-100" style="background:linear-gradient(135deg,#23234a 60%,#6C63FF22 100%); box-shadow:0 0 24px #6C63FF33;">
                <h5 class="text-white mb-3" style="font-weight:700;">Weight Lifted <span class="text-muted" style="font-size:0.9em;">(Monthly)</span></h5>
                <canvas id="weightChart" style="min-height:220px;"></canvas>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card fitforge-glow-card p-3 h-100" style="background:linear-gradient(135deg,#23234a 60%,#00C9A722 100%); box-shadow:0 0 24px #00C9A733;">
                <h5 class="text-white mb-3" style="font-weight:700;">Calories Burned <span class="text-muted" style="font-size:0.9em;">(Monthly)</span></h5>
                <canvas id="caloriesChart" style="min-height:220px;"></canvas>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card fitforge-glow-card p-3 h-100" style="background:linear-gradient(135deg,#23234a 60%,#ff4b5c22 100%); box-shadow:0 0 24px #ff4b5c33;">
                <h5 class="text-white mb-3" style="font-weight:700;">Reps Completed <span class="text-muted" style="font-size:0.9em;">(Monthly)</span></h5>
                <canvas id="repsChart" style="min-height:220px;"></canvas>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h4 class="text-white mb-3" style="font-weight:800; letter-spacing:1px;">Monthly Summary <span class="text-muted" style="font-size:0.9em;">(Best & Average)</span></h4>
        <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0 fitforge-table" style="border-radius:1rem;overflow:hidden;">
                <thead>
                    <tr style="color:#00C9A7; font-size:1.1em;">
                        <th>Month</th>
                        <th>Avg Weight</th>
                        <th style="color:#6C63FF;">Max Weight</th>
                        <th>Avg Calories</th>
                        <th style="color:#00C9A7;">Max Calories</th>
                        <th>Avg Reps</th>
                        <th style="color:#ff4b5c;">Max Reps</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($summary as $month => $s)
                    <tr>
                        <td style="color:#6C63FF;font-weight:700;">{{ $month }}</td>
                        <td>{{ number_format($s['weight_lifted_avg'], 1) }}</td>
                        <td style="color:#fff;font-weight:700; background:rgba(108,99,255,0.12);">{{ $s['weight_lifted_max'] }}</td>
                        <td>{{ number_format($s['calories_burned_avg'], 1) }}</td>
                        <td style="color:#00C9A7;font-weight:700; background:rgba(0,201,167,0.12);">{{ $s['calories_burned_max'] }}</td>
                        <td>{{ number_format($s['reps_completed_avg'], 1) }}</td>
                        <td style="color:#ff4b5c;font-weight:700; background:rgba(255,75,92,0.12);">{{ $s['reps_completed_max'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
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
        font-size: 1em;
    }
    .fitforge-table th {
        background: #18182a !important;
        color: #00C9A7 !important;
        font-weight: 700;
        border: none;
    }
    .fitforge-table td {
        background: rgba(30,30,50,0.7) !important;
        color: #bdbdd7;
        border: none;
    }
    .fitforge-table tr {
        border-radius: 1rem;
    }
    .fitforge-table tr:hover td {
        background: #23234a !important;
        color: #fff;
    }
    @media (max-width: 991px) {
        .fitforge-glow-card { margin-bottom: 1rem; }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const chartData = @json($chartData);
    new Chart(document.getElementById('weightChart'), {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Weight Lifted',
                data: chartData.weight_lifted,
                borderColor: '#6C63FF',
                backgroundColor: 'rgba(108,99,255,0.2)',
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#6C63FF',
                pointRadius: 5,
            }]
        },
        options: {responsive:true, plugins:{legend:{labels:{color:'#fff'}}}, scales:{x:{ticks:{color:'#bdbdd7'}},y:{ticks:{color:'#bdbdd7'}}}}
    });
    new Chart(document.getElementById('caloriesChart'), {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Calories Burned',
                data: chartData.calories_burned,
                borderColor: '#00C9A7',
                backgroundColor: 'rgba(0,201,167,0.2)',
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#00C9A7',
                pointRadius: 5,
            }]
        },
        options: {responsive:true, plugins:{legend:{labels:{color:'#fff'}}}, scales:{x:{ticks:{color:'#bdbdd7'}},y:{ticks:{color:'#bdbdd7'}}}}
    });
    new Chart(document.getElementById('repsChart'), {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Reps Completed',
                data: chartData.reps_completed,
                borderColor: '#ff4b5c',
                backgroundColor: 'rgba(255,75,92,0.2)',
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#ff4b5c',
                pointRadius: 5,
            }]
        },
        options: {responsive:true, plugins:{legend:{labels:{color:'#fff'}}}, scales:{x:{ticks:{color:'#bdbdd7'}},y:{ticks:{color:'#bdbdd7'}}}}
    });
});
</script>
@endpush
