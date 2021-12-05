<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Advertisement extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'price',
        'address',
        'phoneNumber',
        'userID',
        'categoryID',
    ];
}
