<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    // Product Table Connect
    public function products() {
        return $this->hasMany(Product::class);
    }

    // Category Data Select Function
    public static function arrayForSelect() {
        $arr = [];
        $categories = Category::all();

        foreach ($categories as $category) {
            $arr[$category->id] = $category->title;
        }
        return $arr;
    }

}
