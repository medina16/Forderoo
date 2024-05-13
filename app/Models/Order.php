<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'id_order'
    ];

    public function getStatus(){
        switch($this->status){
            case 0: 
                return "Menunggu pembayaran";
            case 1:
                return "Sedang diproses";
            case 2:
                return "Selesai";
            case 3:
                return "Dibatalkan";
        }
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function customerAccount(){
        return $this->belongsTo(CustomerAccount::class);
    }
}
