<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('component_name','like','%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'component_name',
        'component_price',
        'component_picture',
    ];
}
