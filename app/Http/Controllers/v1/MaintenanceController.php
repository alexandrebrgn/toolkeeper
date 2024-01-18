<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Models\Maintenance;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::all();
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
    public function store(StoreMaintenanceRequest $request)
    {
        DB::beginTransaction();

        $tool = Tool::where('id', '=', $request->query('id_tool'));

        //dd($tool);
        //dd($request);
        try {
            $maintenance = Maintenance::create([
                'date' => $request['date'],
                'report' => $request['report'],
                'user_id' => $request->query('id_user'),
            ]);

            $tool->update([
                'dateNextOperation' => $request['dateNextOperation']
            ]);


            $tool = Tool::where('id', '=', $request->query('id_tool'));

            $toolConfirm = Tool::where('id', '=', $request->query('12'))->where('dateNextOperation', '=', '12');
//            if($toolConfirm) {
//                dd($toolConfirm, $tool);
//            }
            DB::commit();

            return response()->json($maintenance, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($maintenance, 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
