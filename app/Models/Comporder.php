<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comporder extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'quantity',
        'contact',
        'component_name',
        'price',
        'total_price',
        'status',
    ];

    public static function single($id){
        $comporders = self::all();

        foreach ($comporders as $order) {
            if($order['id'] == $id){
                return $order;
            }
        }
    }
}
