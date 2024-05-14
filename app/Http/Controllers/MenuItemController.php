<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuItemController extends Controller
{
    public function addToMenu(){

    }

    public function removeFromMenu(){

    }

    public function editInfo(){

    }

    public function searchItem(Request $request){
        $search = $request->search;
        $results = MenuItem::where(function($query) use ($search){
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        })->get(); // Added ->get() to execute the query and retrieve results
    
        return view('menupage', compact('results'))->with('title', 'Search results'); // Simplified passing title to view
    }
    

    public function getMenuList(){
        return view('menupage', [
            'title' => 'Browse Menu',
            'menuitems' => Category::with('menuItem')->get(),
            'cartItems' => Session::get('cart', [])
        ]);
    }

}
