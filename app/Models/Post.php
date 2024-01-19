<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion de uno a muchos inversa con users y categories

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }


    // Relacion de muchos a muchos con la tabla tags

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    // Relacion uno a uno polimorfica
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
