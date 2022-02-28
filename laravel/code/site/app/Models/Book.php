<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'author',
        'pages',
        'status',
    ];


    public function admins()
    {
        return $this->belongsToMany(User::class);
    }

    public function borrowers()
    {
        return $this->belongsToMany(User::class);
    }
}
