<?php

namespace App\Models;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
        'description'       
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Le commentaire appartient à 1 utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
