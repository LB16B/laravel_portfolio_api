<?php

namespace App\Models;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'user_id',
    ];

    public function recipe_like()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user_like()
    {
        return $this->belongsTo(User::class);
    }
}