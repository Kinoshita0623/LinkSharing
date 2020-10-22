<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'text',
        'password',
    ];

    function author(){
        $this->belongsTo(User::class, 'author_id');
    }
}
