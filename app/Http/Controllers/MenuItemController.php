<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;

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
            'menuitems' => Category::with('menuItem')->get()
        ]);
    }

    //----------------------------------------


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }
}
