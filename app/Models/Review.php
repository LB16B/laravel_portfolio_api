<?php

namespace App\Models;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'body',
        'recipe_id'
    ];

    public function recipe_review()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user_review()
    {
        return $this->belongsTo(User::class);
    }
}
