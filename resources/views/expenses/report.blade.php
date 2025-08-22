@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Monthly Expense Report</h2>
        <p class="text-muted">Summary of expenses by category</p>
    </div>

    {{-- Report Table --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Expenses Table</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Category</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($report as $category => $amount)
                        <tr>
                            <td>{{ $category }}</td>
                            <td>${{ $amount }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold table-success">
                        <td>Total</td>
                        <td>${{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card shadow-sm d-flex justify-content-center align-items-center">
        <div class="card-header w-100 bg-success text-white d-flex justify-content-center">
            <h5 class="mb-0">Expenses Pie Chart</h5>
        </div>
        <div class="card-body d-flex justify-content-center align-items-center" style="height: 450px; width: 450px;">
            <canvas id="expenseChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const reportData = {!! json_encode(array_values($report)) !!};
        const reportLabels = {!! json_encode(array_keys($report)) !!};
        const ctx = document.getElementById('expenseChart').getContext('2d');

        if(reportData.length === 0 || reportData.every(v => v == 0)) {
            // Show "No Data" message
            ctx.font = '16px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText('No Data Found', ctx.canvas.width / 2, ctx.canvas.height / 2);
        } else {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: reportLabels,
                    datasets: [{
                        data: reportData,
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                            '#9966FF', '#FF9F40'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    return `${label}: $${value}`;
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>

@endsection

