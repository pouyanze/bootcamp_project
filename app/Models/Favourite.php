<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'favourite',
        'user_id',
        'advertisement_id',
    ];
}
