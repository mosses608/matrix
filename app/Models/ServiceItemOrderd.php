<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ServiceItemOrderd extends Model
{
    use HasFactory;

    protected $table = 'serviceorders'; // Specify the table name if it doesn't follow Laravel's convention

    protected $fillable = [
        'serviceID',
        'itemName',
        'customerName',
        'location',
        'phoneNo',
        'itemPrice',
    ];

    public function scopeFilter(Builder $query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('customerName', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('itemName', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('location', 'like', '%' . $filters['search'] . '%');
        }

        return $query;
    }
}
