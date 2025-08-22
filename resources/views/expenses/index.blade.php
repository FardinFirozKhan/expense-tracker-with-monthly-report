@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Expenses</h2>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add Expense</a>
    </div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Expense List</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $expense->title }}</td>
                            <td>${{ number_format($expense->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $expense->category->name }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No expenses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
