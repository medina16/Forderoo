<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavListItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id_favListItem'
    ];

    public function customerAccount(){
        return $this->belongsTo(CustomerAccount::class);
    }

    public function menuItem(){
        return $this->belongsTo(MenuItem::class);
    }
}
