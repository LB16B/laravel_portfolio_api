<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient',
        'amount',
        'recipe_id'
    ];

    public function recipe_review()
    {
        return $this->belongsTo(Recipe::class);
    }

}
