<?php

namespace App\Http\Controllers;

use App\Models\FavListItem;
use App\Http\Requests\StoreFavListItemRequest;
use App\Http\Requests\UpdateFavListItemRequest;

class FavListItemController extends Controller
{

    public function addToFav(){

    }

    public function removeFromFav(){

    }
    
    public function getCustFave(){

    }

    // -------------------------------
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
    public function store(StoreFavListItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FavListItem $favListItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavListItem $favListItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavListItemRequest $request, FavListItem $favListItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavListItem $favListItem)
    {
        //
    }
}
