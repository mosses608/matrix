<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('product_name','like','%' . request('search') . '%')
            ->orwhere('price','like','%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'product_name',
        'price',
        'product_picture',
        'description',
        'location',
        'contact',
    ];

    public static function find($id){
        $products = self::all();

        foreach($products as $product){
            if($product['id'] == $id){
                return $product;
            }
        }
    }
}
