<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataToolRequest;
use App\Http\Requests\UpdateDataToolRequest;
use App\Models\Datatool;

class DatatoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datatool = Datatool::all();
        return response()->json($datatool);
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
    public function store(StoreDataToolRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Datatool $dataTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datatool $dataTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataToolRequest $request, Datatool $dataTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datatool $dataTool)
    {
        //
    }
}
