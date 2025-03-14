<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'type', 
        'amount', 
        'origin', 
        'destination'
    ];

    public function originAccount()
    {
        return $this->belongsTo(Account::class, 'origin');
    }
    
    public function destinationAccount()
    {
        return $this->belongsTo(Account::class, 'destination');
    }
}
