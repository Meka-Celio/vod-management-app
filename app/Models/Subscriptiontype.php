<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptiontype extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtype_name',
    ];
}
