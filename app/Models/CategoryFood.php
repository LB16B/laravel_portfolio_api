<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class CategoryFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'filename'
    ];

    public function recipe_category_food()
    {
        return $this->hasMany(Recipe::class);
    }
}
