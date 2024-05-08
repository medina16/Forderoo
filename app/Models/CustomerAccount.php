<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Authenticatable
{
    use HasFactory;
    protected $guarded = [
        'id_customer'
    ];

    public function favListItem(){
        return $this->hasMany(FavListItem::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
