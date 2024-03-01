<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user_details = User::get()->find($user->id);
        return response()->json($user_details);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $tool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $tool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $tool)
    {
        //
    }
}
