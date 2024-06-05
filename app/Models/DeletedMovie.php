<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedMovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_name',
        'synopsis',
        'rating',
        'directed_by',
        'release_date',
        'runtime',
        'selling_price',
        'rental_price'
    ];
}
