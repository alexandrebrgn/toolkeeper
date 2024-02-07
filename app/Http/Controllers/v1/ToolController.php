<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Models\Operation;
use App\Models\Tool;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->can('viewAny', Tool::class)) {
            $tools = Tool::with('category')->get();
            return response()->json($tools);
        } else {
            return abort(405);
        }
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
    public function store(StoreToolRequest $request)
    {
        if(auth()->user()->can('create', Tool::class)) {
            $tool = Tool::create([
                'number' => $request['number'],
                'serialId' => $request['serialId'],
                'isActive' => 1,
                'localisation' => $request['localisation'],
                'dateNextOperation' => $request['dateNextOperation'],
                'toDo' => 0,
                'category_id' => $request['category_id']
            ]);
            return response()->json($tool, 201);
        } else {
            return abort(405);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        $tool_details = Tool::with([
            'category'
        ])->get()->find($tool->id);
        return response()->json($tool_details);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolRequest $request, Tool $tool)
    {
        if(auth()->user()->can('update', Tool::class)) {
            $tool->update($request->all());
            return response()->json($tool);
        } else {
            return abort(405);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        //
    }
}
