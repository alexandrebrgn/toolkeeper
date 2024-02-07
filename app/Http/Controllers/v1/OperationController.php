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
        if(auth()->user()->can('viewAny', Operation::class)) {
            $operations = Operation::with(
                'tool',
            )
                ->orderByDesc('toDoDate')
                ->get();
            return response()->json($operations);
        } else {
            return abort(405);
        }
    }

    public function getWithEmail($email)
    {
        $operations = Operation::get()->find($email);
        return response()->json($operations);
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
        if(auth()->user()->can('create', Operation::class)) {
            $operation = Operation::create([
                'date' => $request['date'],
                'report' => $request['report'],
                'toDoDate' => $request['toDoDate'],
                'user_id' => $request['operator_id'],
                'tool_id' => $request['tool_id'],
            ]);

            if($request['dateNextOperation'])
                $operation->tool->update(['dateNextOperation' => $request['dateNextOperation']]);
        } else {
            return abort(405);
        }
        return response()->json($operation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Operation $operation)
    {
        if(auth()->user()->can('viewAn', Operation::class)) {
            $operation_details = Operation::with([
                'tool',
                'user'
            ])->get()->find($operation->id);
            return response()->json($operation_details);
        } else {
            return abort(405);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationRequest $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
