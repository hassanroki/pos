<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = ['category_id', 'title', 'description', 'cost_price', 'price'];

    // Categories Table Connect
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Sale Item Connect Product Table
    public function invoice() {
        return $this->hasMany(SaleItem::class);
    }

    // Select Product Array
    public static function arrayForSelect() {
        $arr        = [];
        $products   = Product::all();
        foreach($products as $product) {
            $arr[$product->id] = $product->title;
        }

        return $arr;
    }

}
