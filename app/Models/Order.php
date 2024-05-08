<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 0;
    const PROCESSING = 1;
    const SHIPPED = 2;
    const DELIVERED = 3;
    const CANCELED = 4;

    protected $guarded = [
        'id_order'
    ];

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function customerAccount(){
        return $this->belongsTo(CustomerAccount::class);
    }
}
