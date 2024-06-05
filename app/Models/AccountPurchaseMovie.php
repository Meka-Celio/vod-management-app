<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AccountPurchaseMovie extends Model
{
    use HasFactory;

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function movie(): HasOne
    {
        return $this->hasOne(Movie::class);
    }

    public function operation(): HasOne
    {
        return $this->hasOne(Operation::class);
    }

    protected $fillable = [
        'account_id',
        'movie_id',
        'operation_id'
    ];
}
