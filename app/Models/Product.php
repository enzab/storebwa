<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'description', 'slug'
    ];

    protected $hidden = [

    ];

    // Relasi ke table galleries ('relasi ke field foreign', 'local field')
    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    // Relasi ke table users
    public function user() {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

}
