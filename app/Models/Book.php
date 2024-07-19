<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

}
