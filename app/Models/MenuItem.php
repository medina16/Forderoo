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

    // public function availability(){
    //     $this->isAvailable = !$this->isAvailable;
    //     $this->save();
    // }

    // public static function newItem($data){
    //     return MenuItem::create($data);
    // }

    // public static function updateItem($id, $data){
    //     $menuItem = MenuItem::find($id);
    //     if ($menuItem) {
    //         $menuItem->update($data);
    //         return $menuItem;
    //     }
    //     return null;
    // }

    // public static function deleteItem($id){
    //     $menuItem = MenuItem::find($id);
    //     if ($menuItem) {
    //         $menuItem->delete();
    //         return true;
    //     }
    //     return false;
    // }

    public function isFavorited()
    {
        return FavListItem::where('customer_account_id', session('id_customer'))
                          ->where('menu_item_id', $this->id)
                          ->exists();
    }

    public function getNamePrice($id){
        $menuItem = MenuItem::find($id);
        if ($menuItem) {
            return [$menuItem->name, $menuItem->price];
        }
        return null;
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
