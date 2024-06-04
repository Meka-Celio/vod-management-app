<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscription extends Model
{
    use HasFactory;

    public function subscriptiontype(): HasOne
    {
        return $this->hasOne(Subscriptiontype::class);
    }

    protected $fillable = [
        'subscription_name',
        'price',
        'subtype_id'
    ];
}
