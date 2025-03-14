<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id', 
        'balance'
    ];

    public function originTransactions()
    {
        return $this->hasMany(Transaction::class, 'origin');
    }

    public function destinationTransactions()
    {
        return $this->hasMany(Transaction::class, 'destination');
    }
}
