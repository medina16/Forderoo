<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use App\Http\Requests\StoreAdminAccountRequest;
use App\Http\Requests\UpdateAdminAccountRequest;

class AdminAccountController extends Controller
{

    public function login(){

    }

    public function logout(){

    }

    //----------------------------------

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
    public function store(StoreAdminAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminAccountRequest $request, AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminAccount $adminAccount)
    {
        //
    }
}
