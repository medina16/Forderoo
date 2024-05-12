<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $guarded = [
        'id_menuItem'
    ];

    // public function availability(){
    //     $this->isAvailable = !$this->isAvailable;
    //     $this->save();
    // }

    public static function newItem($data){
        return MenuItem::create($data);
    }

    public static function updateItem($id, $data){
        $menuItem = MenuItem::find($id);
        if ($menuItem) {
            $menuItem->update($data);
            return $menuItem;
        }
        return null;
    }

    public static function deleteItem($id){
        $menuItem = MenuItem::find($id);
        if ($menuItem) {
            $menuItem->delete();
            return true;
        }
        return false;
    }

    public function getItemInfo($id){
        $menuItem = MenuItem::find($id);
        if ($menuItem) {
            $name = $menuItem->name;
            $category = $menuItem->category();
            $description = $menuItem->description;
            $isAvailable = $menuItem->isAvailable;
            return [$name, $category, $description, $isAvailable];
        }
        return null;
    }

    public function getPhoto($id){
        $menuItem = MenuItem::find($id);
        if ($menuItem) {
            return $menuItem->photo_filename;
        }
        return null;
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
