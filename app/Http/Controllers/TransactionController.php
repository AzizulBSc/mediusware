<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user')->currentUser()->latest()->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function deposit(){
        $transactions = Transaction::with('user')->currentUser()->deposit()->latest()->paginate(10);

        return view('admin.transactions.deposit', compact('transactions'));
}
    public function withdrawal()
    {
        $transactions = Transaction::with('user')->currentUser()->withdrawal()->latest()->paginate(10);

        return view('admin.transactions.withdrawal', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function depositStore(TransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Your Transaction Added Successfully.');
    }

    public function withdrawStore(TransactionRequest $request)
    {
        $user = Auth::user();
        $amount = $request->amount;

        // Determine the withdrawal rate based on the user's account type
        $withdrawalRate = ($user->account_type === 'Individual') ? 0.00015 : 0.00025;

        // Apply free withdrawal conditions for individual accounts
        if ($user->account_type === 'Individual') {
            $freeWithdrawalDay = Carbon::FRIDAY;
            $freeWithdrawalLimitPerTransaction = 1000;
            $freeWithdrawalLimitPerMonth = 5000;

            if (now()->dayOfWeek === $freeWithdrawalDay) {
                // Free withdrawal on Fridays
                $withdrawalRate = 0;
            }

            if ($amount <= $freeWithdrawalLimitPerTransaction) {
                // Free withdrawal for the first 1000 each transaction
                $withdrawalRate = 0;
            }

            $userMonthlyWithdrawalTotal = $user->withdrawals()
                ->whereYear('date', now()->year)
                ->whereMonth('date', now()->month)
                ->sum('amount');

            if ($userMonthlyWithdrawalTotal + $amount <= $freeWithdrawalLimitPerMonth) {
                // Free withdrawal for the first 5000 each month
                $withdrawalRate = 0;
            }
        }

        // Check if the user is a Business account and has reached the total withdrawal limit
        if ($user->account_type === 'Business' && $user->total_withdrawal >= 50000) {
            $withdrawalRate = 0.00015; // Decrease withdrawal fee to 0.015% after 50K total withdrawal
        }

        // Calculate the withdrawal fee
        $withdrawalFee = $amount * $withdrawalRate;

        // Create a new withdrawal transaction
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'transaction_type' => 'Withdraw',
            'amount' => $amount,
            'fee' => $withdrawalFee,
        ]);
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Your Transaction Added Successfully.');


    }

}
