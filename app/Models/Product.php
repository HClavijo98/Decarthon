<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'value',
        'stock',
        'img'
    ];
    public function category(){
        return $this->hasOne(Category::class);
    }
    public function brand(){
        return $this->hasOne(Brand::class);
    }
    public function shoppingCarts()
    {
        return $this->belongsToMany(Shopping_cart::class);
    }
    public function sugestionBoxes()
    {
        return $this->hasMany(Sugestion_box::class);
    }
}
