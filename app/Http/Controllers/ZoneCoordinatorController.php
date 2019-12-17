<?php

namespace App\Http\Controllers;

use App\ZoneCoordinator;
use Illuminate\Http\Request;

class ZoneCoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = ZoneCoordinator::all();
        //return response()->json($zones);

        return view('zonecoordinators.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zonecoordinators.index', compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ZoneCoordinator::create($request->all());

        return redirect('zone_coordinator');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ZoneCoordinator  $zoneCoordinator
     * @return \Illuminate\Http\Response
     */
    public function show(ZoneCoordinator $zoneCoordinator)
    {
        return response()->json($zoneCoordinator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ZoneCoordinator  $zoneCoordinator
     * @return \Illuminate\Http\Response
     */
    public function edit(ZoneCoordinator $zoneCoordinator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ZoneCoordinator  $zoneCoordinator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZoneCoordinator $zoneCoordinator)
    {
        $zoneCoordinator->update($request->all());

        return redirect('zone_coordinator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ZoneCoordinator  $zoneCoordinator
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZoneCoordinator $zoneCoordinator)
    {
        $zoneCoordinator->delete();
        return response()->json("bien");
    }
}
