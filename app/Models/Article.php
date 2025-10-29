<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
       use HasFactory;

    protected $fillable = [
        'user_id',
        'titre',
        'description'
    ];


           public function user()
    {
        return $this->belongsTo(User::class);
    }

    // L'article peut avoir plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
