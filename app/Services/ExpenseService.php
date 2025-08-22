<?php

namespace App\Services;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ExpenseService
{
    public function getAllExpenses()
    {
        return Expense::where('user_id', Auth::id())
                      ->with('category')
                      ->orderBy('date', 'desc')
                      ->get();
    }

    public function storeExpense($data)
    {
        $data['user_id'] = Auth::id();
        return Expense::create($data);
    }

    public function monthlyReport()
    {
        $userId = auth()->id();
        $categories = Category::pluck('name', 'id');
        $expenses = Expense::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->pluck('total', 'category_id');

        $report = [];
        foreach ($categories as $id => $name) {
            $report[$name] = number_format($expenses[$id] ?? 0, 2, '.', '');
        }

        $total = number_format(array_sum($report), 2, '.', '');

        return [
            'report' => $report,
            'total' => $total,
        ];
    }

    public function getCategories()
    {
        return Category::all();
    }
}
