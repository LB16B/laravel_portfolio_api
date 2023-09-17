<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'ingredient',
        'amount'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }



}
