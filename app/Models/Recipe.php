<?php

namespace App\Models;

use App\Models\Food;
use App\Models\Manual;
use App\Models\Review;
use App\Models\Like;
use App\Models\CategoryAge;
use App\Models\CategoryFood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'time',
        'price',
        'filename',
        'category_age_id',
        'category_food_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function manual()
    {
        return $this->hasMany(Manual::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function category_age()
    {
        return $this->belongsTo(CategoryAge::class);
    }

    public function category_food()
    {
        return $this->belongsTo(CategoryFood::class);
    }
}
