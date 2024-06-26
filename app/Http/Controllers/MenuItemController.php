<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\CartController;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuItemController extends Controller
{
    public function addToMenu(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'category' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->name . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move(public_path('menuimg'), $imageName);
        }

        $menu = new MenuItem();
        $menu->name = $request->name;
        $menu->category_id = $request->category;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->photo_filename = "/menuimg/" . $imageName;
        $menu->save();

        return redirect('/admin/menu')->with('success', 'Menu berhasil dibuat.');
    }


    public function removeFromMenu(Request $request){
        MenuItem::find($request->id)->delete();
        return redirect('/admin/menu')->with('success', 'Menu berhasil dihapus.');
    }

    public function editInfo(Request $request){
        $request->validate([
            'id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'string|max:255',
            'category' => 'integer',
            'description' => 'string',
            'price' => 'numeric',
        ]);

        $menu = MenuItem::find($request->id);
        $menu->name = $request->name;
        $menu->category_id = $request->category;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->name . '.' . $image->getClientOriginalExtension();
            $menu->photo_filename = "/menuimg/" . $imageName;
        }

        $menu->save();

        return redirect('/admin/menu')->with('success', 'Menu berhasil diperbarui.');
    }

    public function updateAvailable(Request $request){
        $request->validate([
            'isAvailable' => 'required|in:0,1',
            'id' => 'required|integer'
        ]);

        $menuItem = MenuItem::find($request->id);

        $menuItem->isAvailable = $request->isAvailable;
        $menuItem->save();

        return redirect()->back()->with('status', 'Availability updated successfully!');
    }

    public function searchItem(Request $request){
        $cartController = new CartController();
        list($cartItems, $totalQuantity, $totalPrice) = $cartController->countTotal();

        $search = $request->search;
        $results = MenuItem::where(function($query) use ($search){
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        })->get(); // Added ->get() to execute the query and retrieve results
        
        return view('menupage', [
            'title' => 'Search Results',
            'results' => $results,
            'cartItems' => $cartItems,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
        ]);

    }
    

    public function getMenuList(){
        $cartController = new CartController();
        list($cartItems, $totalQuantity, $totalPrice) = $cartController->countTotal();

        return view('menupage', [
            'title' => 'Browse Menu',
            'menuitems' => Category::with('menuItem')->get(),
            'cartItems' => $cartItems,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
        ]);
    }

}
