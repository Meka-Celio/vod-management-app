<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeletedUser extends Model
{
    use HasFactory;

    public function usertype(): HasOne
    {
        return $this->hasOne(Usertype::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype_id'
    ];
}
