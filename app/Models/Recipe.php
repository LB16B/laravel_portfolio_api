<?php

namespace App\Models;

use App\Models\Food;
use App\Models\Review;
use App\Models\CategoryAge;
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
        'category_age_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function category_age()
    {
        return $this->belongsTo(CategoryAge::class);
    }
}
