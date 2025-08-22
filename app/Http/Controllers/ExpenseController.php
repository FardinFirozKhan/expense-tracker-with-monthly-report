<?php

namespace App\Http\Controllers;

use App\Services\ExpenseService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;


class ExpenseController extends Controller
{

    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    public function index()
    {
        $expenses = $this->expenseService->getAllExpenses();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $categories = $this->expenseService->getCategories();
        return view('expenses.create', compact('categories'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = $this->expenseService->storeExpense($request->validated());
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }

    public function report()
    {
        $data = $this->expenseService->monthlyReport();
        return view('expenses.report', [
            'report' => $data['report'],
            'total'  => $data['total'],
        ]);
    }
}
