<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('created_at' , 'like' , '%' . request('search') . '%')
            ->orwhere('project_name' , 'like' , '%' . request('search') . '%')
            ->orwhere('name' , 'like' , '%' . request('search') . '%')
            ->orwhere('contact' , 'like' , '%' . request('search') . '%')
            ->orwhere('status' , 'like' , '%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'project_name',
        'name',
        'contact',
        'status',
    ];

    public static function find($id){
        $orders = self::all();

        foreach($orders as $order){
            if($order['id'] == $id){
                return $order;
            }
        }
    }
}
