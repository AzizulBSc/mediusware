<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Adjust the authorization logic if needed
    }

    public function rules()
    {
        return [
            'transaction_type' => 'required|in:Deposit,Withdraw',
            'amount' => 'required|numeric|min:0',
            'user_id'=>'required|numeric',
            'fee' => 'nullable|numeric',
             
        ];
    }
}
