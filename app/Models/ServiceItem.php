<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'itemName',
        'itemPrice',
        'itemImage',
        'phoneNumber',
        'location',
    ];

    // Cast itemImage attribute to array
    protected $casts = [
        'itemImage' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
