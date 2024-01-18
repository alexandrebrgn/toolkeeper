<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataCategoryRequest;
use App\Http\Requests\UpdateDataCategoryRequest;
use App\Models\Datacategory;

class DatacategoryController extends Controller
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
    public function store(StoreDataCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Datacategory $dataCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datacategory $dataCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataCategoryRequest $request, Datacategory $dataCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datacategory $dataCategory)
    {
        //
    }
}
