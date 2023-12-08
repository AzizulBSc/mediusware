<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'transaction_type', 'amount', 'date','fee'];

    public function user(){
        return $this->belongsTo(User::class);
}

    public function scopeDeposit($query)
    {
        return $query->where('transaction_type', 'Deposit');
    }
    public function scopeWithdrawal($query)
    {
        return $query->where('transaction_type', 'Withdraw');
    }
    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->id());
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $transaction->date = now();
        });
        static::created(function ($transaction) {
            $user = $transaction->user;

            if ($transaction->transaction_type === 'Deposit') {
                $user->balance += ($transaction->amount - $transaction->fee) ;
            } elseif ($transaction->transaction_type === 'Withdraw') {
                $user->balance -= ($transaction->amount  + $transaction->fee);
            }

            $user->save();
        });
    }


}
