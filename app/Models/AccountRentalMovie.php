<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AccountRentalMovie extends Model
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

    public function operationtype(): HasOne
    {
        return $this->hasOne(Operationtype::class);
    }

    protected $fillable = [
        'start_rental',
        'end_rental',
        'account_id',
        'movie_id',
        'operation_id'
    ];
}
