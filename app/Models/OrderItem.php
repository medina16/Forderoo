<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id_orderItem'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function menuItem(){
        return $this->belongsTo(MenuItem::class);
    }
}
