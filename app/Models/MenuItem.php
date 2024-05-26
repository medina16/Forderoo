<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id_menuItem'
    ];

    public function isFavorited()
    {
        return FavListItem::where('customer_account_id', session('id_customer'))
                          ->where('menu_item_id', $this->id)
                          ->exists();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function favList(){
        return $this->hasMany(FavListItem::class);
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
