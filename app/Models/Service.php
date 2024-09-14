<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceName',
        'serviceImage',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('serviceName', 'like', '%' . request('search') . '%');
        }
    }

    // Modify the find method to use the primary key 'id'
    public static function find($id)
    {
        return self::where('id', $id)->first();
    }

    //code for relationship
    public function serviceItems()
    {
        return $this->hasMany(ServiceItem::class);
    }
}
