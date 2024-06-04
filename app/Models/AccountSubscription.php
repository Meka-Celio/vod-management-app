<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AccountSubscription extends Model
{
    use HasFactory;

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    protected $fillable = [
        'start_sub',
        'end_sub',
        'account_id',
        'sub_id'
    ];
}
