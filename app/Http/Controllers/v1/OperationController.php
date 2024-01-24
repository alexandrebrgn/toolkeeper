<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Models\Operation;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Operation::all();
        return response()->json($maintenances);
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
    public function store(StoreOperationRequest $request)
    {
//        DB::beginTransaction();
//        DB::commit();
//        DB::transaction();

        $maintenance = Operation::create([
            'date' => $request['date'],
            'report' => $request['report'],
            'user_id' => $request->query('id_user'),
            'tool_id' => $request->query('id_tool'),0
        ]);

        $maintenance->tool->update([
            'dateNextOperation' => $request['dateNextOperation']
        ]);

        return response()->json($maintenance, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Operation $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operation $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationRequest $request, Operation $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $maintenance)
    {
        //
    }
}
