<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manual extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'recipe_id'
    ];

    public function recipe_manual()
    {
        return $this->belongsTo(Recipe::class);
    }
}
