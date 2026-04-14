<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'rice_id',
        'quantity',
        'price',
        'total',
        'status',
    ];

    public function rice()
    {
        return $this->belongsTo(Rice::class);
    }

    public function payments()
{
    return $this->hasMany(Payment::class);
}
}